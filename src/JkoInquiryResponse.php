<?php

namespace Jkopay;

class JkoInquiryResponse
{
    /**
     * 請參照 API 回覆代碼（responseCode）。
     * @var mixed
     */
    protected $result;

    /**
     * 結果訊息或失敗理由。
     * @var mixed
     */
    protected $message;

    /**
     * 依 JSON 格式，陣列帶入訂單資訊。
     * @var JkoTransaction[]
     */
    protected $transactions;

    /**
     * 原始 JSON 資訊
     * @var string
     */
    protected $raw_payload;

    /**
     * @param string $payload 
     * @return JkoInquiryResponse 
     */
    static public function parseRaw(string $payload)
    {
        $decoded = json_decode($payload);

        $transactions = array_map(function ($transaction) {
            return (new JkoTransaction)
                ->setPlatformOrderId($transaction->platform_order_id)
                ->setStatus($transaction->status)
                ->setTradeNo($transaction->tradeNo)
                ->setTransTime($transaction->trans_time)
                ->setFinalPrice($transaction->final_price)
                ->setRedeemAmount($transaction->redeem_amount)
                ->setRedeemJkoCoinAmount($transaction->redeem_detail->jko_coin_amount)
                ->setRedeemOfficialCouponAmount($transaction->redeem_detail->official_coupon_amount)
                ->setRedeemStoreCouponAmount($transaction->redeem_detail->store_coupon_amount)
                ->setDebitAmount($transaction->debit_amount)
                ->setInvoiceVehicle($transaction->invoice_vehicle)
                ->setMaskNo($transaction->maskNo)
                ->setChannelType($transaction->channel_type)
                ->setRefundHistory(array_map(function ($refund_history) {
                    return (new JkoRefund)
                        ->setResult($refund_history->result)
                        ->setMessage($refund_history->message)
                        ->setRefundTradeNo($refund_history->refund_tradeNo)
                        ->setRefundTime($refund_history->time)
                        ->setDebitAmount($refund_history->debit_amount)
                        ->setRedeemAmount($refund_history->redeem_amount)
                        ->setRedeemJkoCoinAmount($refund_history->redeem_detail->jko_coin_amount)
                        ->setRedeemOfficialCouponAmount($refund_history->redeem_detail->official_coupon_amount)
                        ->setRedeemStoreCouponAmount($refund_history->redeem_detail->store_coupon_amount);
                }, $transaction->refund_history));
        }, $decoded->result_object->transactions);

        return (new JkoInquiryResponse())
            ->setRawPayload($payload)
            ->setResult($decoded->result)
            ->setMessage($decoded->message)
            ->setTransactions($transactions);
    }

    public function setResult($result)
    {
        $this->result = $result;
        return $result;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }
    
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;
        return $this;
    }

    public function getTransactions()
    {
        return $this->transactions;
    }

    public function setRawPayload($raw_payload)
    {
        return $this->raw_payload = $raw_payload;
    }

    public function getRawPayload()
    {
        return $this->raw_payload;
    }
}