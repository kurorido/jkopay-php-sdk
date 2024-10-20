<?php

namespace Jkopay;

class JkoPayService
{
    /**
     * 訂單創建 Entry API
     */
    const EntryEndpoints_UAT = 'https://uat-onlinepay.jkopay.app/platform/entry';
    const EntryEndpoints_Production = 'https://onlinepay.jkopay.com/platform/entry';

    /**
     * 退款 Refund API
     */
    const RefundEndpoints_UAT = 'https://uat-onlinepay.jkopay.app/platform/refund';

    /**
     * 查詢 Inquiry API
     */
    const InquiryEndpoints_UAT = 'https://uat-onlinepay.jkopay.app/platform/inquiry';
    const InquiryEndpoints_Production = 'https://onlinepay.jkopay.com/platform/inquiry';

    public function __construct(
        public $api_key,
        public $secret_key,
        public $testing = false
    ) {}

    protected function getEntryEndpoints()
    {
        return $this->testing ?
            'https://onlinepay.jkopay.com/platform/entry'
            : 'https://uat-onlinepay.jkopay.app/platform/entry';
    }

    protected function doPostRequest($endpoint, $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $endpoint,
            CURLOPT_POST => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'API-KEY: ' . $this->api_key,
                'DIGEST: ' . JkoUtils::sign($request, $this->secret_key)
            ),
            CURLOPT_POSTFIELDS => $request,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_RETURNTRANSFER => true,
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    protected function doGetRequest($endpoint, $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $endpoint . '?=' . $request,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'API-KEY: ' . $this->api_key,
            'DIGEST: ' . JkoUtils::sign($request, $this->secret_key)
          ),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    /**
     * 電商平台呼叫此 API 取得街口付款 payment_url，電商平台交易序號為唯一值不可重複；
     * 當訂單付款未完成前，重複呼叫此 API 會回覆同一街口付款網址
     * @param JkoCheckoutRequest $request 
     * @return JkoCheckoutResponse 
     */
    public function sendCheckout(JkoCheckoutRequest $request)
    {
        $response = $this->doPostRequest(
            $this->testing ?
            self::EntryEndpoints_Production : self::EntryEndpoints_UAT, $request);

        return JkoCheckoutResponse::parseRaw($response);
    }

    /**
     * 電商平台呼叫此 API，查詢該筆電商平台交易序號的付款、退款歷程。
     * @param JkoInquiryRequest $request 
     * @return JkoInquiryResponse 
     */
    public function sendInquiry(JkoInquiryRequest $request)
    {
        $response = $this->doGetRequest($this->testing ?
            self::InquiryEndpoints_Production : self::InquiryEndpoints_UAT, $request);

        return JkoInquiryResponse::parseRaw($response);
    }
}