<?php

namespace Jkopay;

class JkoProduct
{
    /**
     * 商品名稱
     * @var string
     */
    protected string $name;

    /**
     * 商品圖片網址 (非必填)
     * @var string|null
     */
    protected $img = null;

    /**
     * 商品數量
     * @var int
     */
    protected $unit_count;

    /**
     * 商品單價（原價）
     * @var int
     */
    protected $unit_price;

    /**
     * 商品單價（付款價格）
     * @var int
     */
    protected $unit_final_price;

    public function __construct(
        $name, $img, $unit_count,
        $unit_price, $unit_final_price)
    {
        $this->name = $name;
        $this->img = $img;
        $this->unit_count = $unit_count;
        $this->unit_price = $unit_price;
        $this->unit_final_price = $unit_final_price;
    }

    public function __toString(): string
    {
        return json_encode(
            array_filter($this->toObject(),
            fn($value) => !is_null($value) && $value !== ''
        ));
    }

    public function toObject()
    {
        return [
            'name' => $this->name,
            'img' => $this->img,
            'unit_count' => $this->unit_count,
            'unit_price' => $this->unit_price,
            'unit_final_price' => $this->unit_final_price
        ];
    }
}