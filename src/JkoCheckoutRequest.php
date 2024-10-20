<?php

namespace Jkopay;

class JkoCheckoutRequest
{
    /**
     * 電商平台端交易序號，需為唯一值，不可重複。
     * @var string
     */
    protected string $platform_order_id;

    /**
     * 商店編號，請依街口提供的測試/正式商店代碼更新。
     * @var string
     */
    protected string $store_id;

    /**
     * 付款貨幣[ISO 4217]，請帶入 TWD。
     * @var string
     */
    protected string $currency = 'TWD';

    /**
     * 訂單原始金額
     * @var int
     */
    protected int $total_price;

    /**
     * 訂單實際消費金額
     * @var int
     */
    protected $final_price;

    /**
     * 不可折抵金額 (非必填)
     * @var int
     */
    protected $unredeem = 0;

    /**
     * 訂單有效期限，依 UTC+8 時區。 格式 : YYYY-mm-dd HH:MM (非必填)
     * @var string
     */
    protected $valid_time;
    
    /**
     * 買家在街口確認付款頁面輸入密碼後，街口服務器訪問此電商平台服務器網址確認訂單正確性與存貨彈性 (非必填)
     * @var ?string
     */
    protected ?string $confirm_url = null;

    /**
     * 消費者付款完成後，街口服務器訪問此電商平台服務器網址，並在參數中提供街口交易序號與訂單交易狀態代碼。(非必填)
     * @var ?string
     */
    protected ?string $result_url = null;

    /**
     * 消費者付款完成後點選完成按鈕，將消費者導向此電商平台客戶端付款結果頁網址。(非必填)
     * @var ?string
     */
    protected ?string $result_display_url = null;

    /**
     * 付款模式 : “onetime” 為一次性，”regular” 為定期定額付款；預設為一次性付款。
     * @var string
     */
    protected $payment_type = 'onetime';

    /**
     * 是否支持價金保管，預設為 False 不支持。
     * @var bool
     */
    protected $escrow = false;

    /**
     * 支援 JSON/String 格式，陣列
     * 當使用 products 欄位時，則除了 products.img 其餘皆為必要欄位。
     * @var JkoProduct[]
     */
    protected $products;

    public function __toString(): string
    {
        return json_encode(array_filter(
            $this->toObject(),
            fn($value) => !is_null($value) && $value !== ''
        ));
    }

    public function toObject()
    {
        return [
            'platform_order_id' => $this->platform_order_id,
            'store_id' => $this->store_id,
            'total_price' => $this->total_price,
            'final_price' => $this->final_price,
            'currency' => $this->currency,
            'unredeem' => $this->unredeem,
            'valid_time' => $this->valid_time,
            'confirm_url' => $this->confirm_url,
            'result_url' => $this->result_url,
            'result_display_url' => $this->result_display_url,
            'payment_type' => $this->payment_type,
            'escrow' => $this->escrow,
            'products' => array_map(fn ($product) => $product->toObject(), $this->products)
        ];
    }

    public function setPlatformOrderId($platform_order_id)
    {
        $this->platform_order_id = $platform_order_id;
        return $this;
    }

    public function getPlatformOrderId()
    {
        return $this->platform_order_id;
    }

    public function setStoreId($store_id)
    {
        $this->store_id = $store_id;
        return $this;
    }

    public function getStoreId()
    {
        return $this->store_id;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }

    public function setTotalPrice($total_price)
    {
        $this->total_price = $total_price;
        return $this;
    }

    public function getFinalPrice() {
        return $this->final_price;
    }

    public function setFinalPrice($final_price) {
        $this->final_price = $final_price;
        return $this;
    }

    public function getUnredeem() {
        return $this->unredeem;
    }

    public function setUnredeem($unredeem) {
        $this->unredeem = $unredeem;
        return $this;
    }

    public function getValidTime() {
        return $this->valid_time;
    }

    public function setValidTime($valid_time) {
        $this->valid_time = $valid_time;
        return $this;
    }

    public function getConfirmUrl() {
        return $this->confirm_url;
    }

    public function setConfirmUrl($confirm_url) {
        $this->confirm_url = $confirm_url;
        return $this;
    }

    public function getResultUrl() {
        return $this->result_url;
    }

    public function setResultUrl($result_url) {
        $this->result_url = $result_url;
        return $this;
    }

    public function getResultDisplayUrl() {
        return $this->result_display_url;
    }

    public function setResultDisplayUrl($result_display_url) {
        $this->result_display_url = $result_display_url;
        return $this;
    }

    public function getPaymentType() {
        return $this->payment_type;
    }

    public function setPaymentType($payment_type) {
        $this->payment_type = $payment_type;
        return $this;
    }

    public function getEscrow() {
        return $this->escrow;
    }

    public function setEscrow($escrow) {
        $this->escrow = $escrow;
        return $this;
    }

    public function getProducts() {
        return $this->products;
    }

    public function setProducts($products) {
        $this->products = $products;
        return $this;
    }
}