<?php

namespace Jkopay;

class JkoResultResponse
{
    /**
     * 
     * @var JkoTransaction
     */
    protected $transaction;

    /**
     * 原始 JSON 資訊
     * @var string
     */
    protected $raw_payload;

    static public function parseRaw(string $payload)
    {
        $decoded = json_decode($payload);

        return (new JkoResultResponse)
            ->setRawPayload($payload)
            ->setTransaction(
                (new JkoTransaction)
                    ->setPlatformOrderId($decoded->transaction->platform_order_id ?? null)
                    ->setStatus($decoded->transaction->status ?? null)
                    ->setTradeNo($decoded->transaction->tradeNo ?? null)
                    ->setTransTime($decoded->transaction->trans_time ?? null)
                    ->setFinalPrice($decoded->transaction->final_price ?? null)
                    ->setRedeemAmount($decoded->transaction->redeem_amount ?? null)
                    ->setRedeemJkoCoinAmount($decoded->transaction->redeem_detail->jko_coin_amount ?? null)
                    ->setRedeemOfficialCouponAmount($decoded->transaction->redeem_detail->official_coupon_amount ?? null)
                    ->setRedeemStoreCouponAmount($decoded->transaction->redeem_detail->store_coupon_amount ?? null)
                    ->setDebitAmount($decoded->transaction->debit_amount ?? null)
                    ->setInvoiceVehicle($decoded->transaction->invoice_vehicle ?? null)
                    ->setMaskNo($decoded->transaction->maskNo ?? null)
                    ->setChannelType($decoded->transaction->channel_type ?? null)
            );
    }

    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
        return $this;
    }

    public function getTransaction()
    {
        return $this->transaction;
    }

    public function setRawPayload($payload)
    {
        $this->raw_payload = $payload;
        return $this;
    }

    public function getRawPayload()
    {
        return $this->raw_payload;
    }
}