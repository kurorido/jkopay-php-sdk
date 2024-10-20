<?php

namespace Jkopay;

class JkoTransaction
{
    /**
     * 電商平台端交易序號
     * @var mixed
     */
    protected $platform_order_id;

    /**
     * 請參照 orderStatusCode
     * @var mixed
     */
    protected $status;

    /**
     * 街口端交易序號
     * @var mixed
     */
    protected $tradeNo;

    /**
     * 訂單交易時間，格式: YYYY-mm-dd HH:MM:SS
     * @var mixed
     */
    protected $trans_time;

    /**
     * 訂單實際消費金額
     * @var mixed
     */
    protected $final_price;

    /**
     * 折抵金額=街口幣折抵+官方街口券折抵+店家街口券折抵
     * @var mixed
     */
    protected $redeem_amount;

    /**
     * 街口幣折抵
     * @var mixed
     */
    protected $redeem_jko_coin_amount;

    /**
     * 官方街口券折抵
     * @var mixed
     */
    protected $redeem_official_coupon_amount;

    /**
     * 店家街口券折抵
     * @var mixed
     */
    protected $redeem_store_coupon_amount;

    /**
     * 付款方式扣款金額（折抵後金額）
     * @var mixed
     */
    protected $debit_amount;

    /**
     * 街口帳戶發票載具
     * @var mixed
     */
    protected $invoice_vehicle;

    /**
     * 付款工具使用信用卡時提供卡號前六後四碼，格式：222222******3333
     * @var mixed
     */
    protected $maskNo;

    /**
     * 支付工具
     * "account": 儲值帳戶
     * "bank": 銀行帳戶
     * "creditcard": 信用卡
     * @var mixed
     */
    protected $channel_type;

    /**
     * 列出退款歷程；依 JSON 格式，陣列帶入退款資訊。
     * @var JkoRefund[]
     */
    protected $refund_history;

    public function getPlatformOrderId() {
        return $this->platform_order_id;
    }
    
    public function setPlatformOrderId($platform_order_id) {
        $this->platform_order_id = $platform_order_id;
        return $this;
    }
    
    public function getStatus() {
        return $this->status;
    }
    
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }
    
    public function getTradeNo() {
        return $this->tradeNo;
    }
    
    public function setTradeNo($tradeNo) {
        $this->tradeNo = $tradeNo;
        return $this;
    }
    
    public function getTransTime() {
        return $this->trans_time;
    }
    
    public function setTransTime($trans_time) {
        $this->trans_time = $trans_time;
        return $this;
    }
    
    public function getFinalPrice() {
        return $this->final_price;
    }
    
    public function setFinalPrice($final_price) {
        $this->final_price = $final_price;
        return $this;
    }
    
    public function getRedeemAmount() {
        return $this->redeem_amount;
    }
    
    public function setRedeemAmount($redeem_amount) {
        $this->redeem_amount = $redeem_amount;
        return $this;
    }
    
    public function getRedeemJkoCoinAmount() {
        return $this->redeem_jko_coin_amount;
    }
    
    public function setRedeemJkoCoinAmount($redeem_jko_coin_amount) {
        $this->redeem_jko_coin_amount = $redeem_jko_coin_amount;
        return $this;
    }
    
    public function getRedeemOfficialCouponAmount() {
        return $this->redeem_official_coupon_amount;
    }
    
    public function setRedeemOfficialCouponAmount($redeem_official_coupon_amount) {
        $this->redeem_official_coupon_amount = $redeem_official_coupon_amount;
        return $this;
    }
    
    public function getRedeemStoreCouponAmount() {
        return $this->redeem_store_coupon_amount;
    }
    
    public function setRedeemStoreCouponAmount($redeem_store_coupon_amount) {
        $this->redeem_store_coupon_amount = $redeem_store_coupon_amount;
        return $this;
    }
    
    public function getDebitAmount() {
        return $this->debit_amount;
    }
    
    public function setDebitAmount($debit_amount) {
        $this->debit_amount = $debit_amount;
        return $this;
    }
    
    public function getInvoiceVehicle() {
        return $this->invoice_vehicle;
    }
    
    public function setInvoiceVehicle($invoice_vehicle) {
        $this->invoice_vehicle = $invoice_vehicle;
        return $this;
    }
    
    public function getMaskNo() {
        return $this->maskNo;
    }
    
    public function setMaskNo($maskNo) {
        $this->maskNo = $maskNo;
        return $this;
    }
    
    public function getChannelType() {
        return $this->channel_type;
    }
    
    public function setChannelType($channel_type) {
        $this->channel_type = $channel_type;
        return $this;
    }

    public function setRefundHistory($refund_history)
    {
        $this->refund_history = $refund_history;
        return $this;
    }

    public function getRefundHistory()
    {
        return $this->refund_history;
    }
}