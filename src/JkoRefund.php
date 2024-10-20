<?php

namespace Jkopay;

class JkoRefund
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
     * 街口端退款交易序號
     * @var mixed
     */
    protected $refund_tradeNo;

    /**
     * 消費者付款方式退款金額
     * @var mixed
     */
    protected $debit_amount;

    /**
     * 退還折抵金額
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
     * 退款時間。格式: YYYY-mm-dd HH:MM:SS
     * @var mixed
     */
    protected $refund_time;

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
    
    public function getRefundTradeNo() {
        return $this->refund_tradeNo;
    }
    
    public function setRefundTradeNo($refund_tradeNo) {
        $this->refund_tradeNo = $refund_tradeNo;
        return $this;
    }
    
    public function getDebitAmount() {
        return $this->debit_amount;
    }
    
    public function setDebitAmount($debit_amount) {
        $this->debit_amount = $debit_amount;
        return $this;
    }
    
    public function getRedeemAmount() {
        return $this->redeem_amount;
    }
    
    public function setRedeemAmount($redeem_amount) {
        $this->redeem_amount = $redeem_amount;
        return $this;
    }
    
    public function getRedeemJkoCoinAmount(){
        return $this->redeem_jko_coin_amount;
    }
    
    public function setRedeemJkoCoinAmount($redeem_jko_coin_amount){
        $this->redeem_jko_coin_amount = $redeem_jko_coin_amount;
        return $this;
    }
    
    public function getRedeemOfficialCouponAmount(){
        return $this->redeem_official_coupon_amount;
    }
    
    public function setRedeemOfficialCouponAmount($redeem_official_coupon_amount){
        $this->redeem_official_coupon_amount = $redeem_official_coupon_amount;
        return $this;
    }
    
    public function getRedeemStoreCouponAmount(){
        return $this->redeem_store_coupon_amount;
    }
    
    public function setRedeemStoreCouponAmount($redeem_store_coupon_amount){
        $this->redeem_store_coupon_amount = $redeem_store_coupon_amount;
        return $this;
    }
    
    public function getRefundTime(){
        return $this->refund_time;
    }
    
    public function setRefundTime($refund_time){
        $this->refund_time = $refund_time;
        return $this;
    }
}