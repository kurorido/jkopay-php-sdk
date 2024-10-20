<?php

namespace Jkopay;

class JkoInquiryRequest
{
    /**
     * 電商平台端交易序號，最多可以查詢 20 筆交易。
     * @var mixed
     */
    protected $platform_order_ids;

    public function setPlatformOrderIds($platform_order_ids)
    {
        $this->platform_order_ids = $platform_order_ids;
        return $this;
    }

    public function getPlatformOrderIds()
    {
        return $this->platform_order_ids;
    }

    public function __toString(): string
    {
        return 'platform_order_ids=' . implode(',', $this->platform_order_ids);
    }
}