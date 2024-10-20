<?php

namespace Jkopay;

class JkoCheckoutResponse
{
    /**
     * 請參照 API 回覆代碼（responseCode）
     * @var string
     */
    protected $result;

    /**
     * 結果訊息或失敗理由。
     * @var string
     */
    protected $message;

    /**
     * 付款導向網址，街口 Server 判斷 :
     * - 電腦或平板網頁交易環境，提供街口付款QRCode導向網址。
     * - 行動裝置支付環境，從消費者手機重新導向到街口App付款頁面。
     * @var string
     */
    protected $payment_url;

    /**
     * QRCode 圖檔，電商平台可將 QRCode 嵌入付款網頁。
     * @var string
     */
    protected $qr_image;

    /**
     * QRCode/payment_url 失效時間。回覆的 payment_url 與QRCode 可在 20 分鐘內使用，只要在 valid_time 期限前都可使用同筆 platform_order_id 請求 entry API 更新QRCode/payment_url 時限。
     * @var timestamp
     */
    protected $qr_timeout;

    /**
     * 原始 JSON 資訊
     * @var string
     */
    protected $raw_payload;

    /**
     * 解析原始 JSON 字串
     * @param string $payload 
     * @return JkoCheckoutResponse 
     */
    static public function parseRaw(string $payload)
    {
        $decoded = json_decode($payload);

        return (new JkoCheckoutResponse())
            ->setRawPayload($payload)
            ->setResult($decoded->result ?? null)
            ->setMessage($decoded->message ?? null)
            ->setPaymentUrl($decoded->result_object->payment_url ?? null)
            ->setQrImage($decoded->result_object->qr_img ?? null)
            ->setQrTimeout($decoded->result_object->qr_timeout ?? null);
    }

    public function getResult() {
        return $this->result;
    }
    
    public function setResult($result) {
        $this->result = $result;
        return $this;
    }
    
    public function getMessage() {
        return $this->message;
    }
    
    public function setMessage($message) {
        $this->message = $message;
        return $this;
    }
    
    public function getPaymentUrl() {
        return $this->payment_url;
    }
    
    public function setPaymentUrl($payment_url) {
        $this->payment_url = $payment_url;
        return $this;
    }
    
    public function getQrImage() {
        return $this->qr_image;
    }
    
    public function setQrImage($qr_image) {
        $this->qr_image = $qr_image;
        return $this;
    }
    
    public function getQrTimeout() {
        return $this->qr_timeout;
    }
    
    public function setQrTimeout($qr_timeout) {
        $this->qr_timeout = $qr_timeout;
        return $this;
    }

    public function setRawPayload($raw_payload)
    {
        $this->raw_payload = $raw_payload;
        return $this;
    }
    
    public function getRawPayload()
    {
        return $this->raw_payload;
    }
}