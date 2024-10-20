<?php

namespace Jkopay;

/**
 * 非必要電商平台實作功能；為確保付款時訂單正確性與付款彈性，
 * 在執行付款流程前，街口 Server callback 此電商平台 Server url 確認訂單
 * 回覆正確後才會執行付款流程。
 * @package App\Services\Jko
 */
class JkoConfirmResponse
{
    /**
     * 
     * @var mixed
     */
    protected $platform_order_id;

    /**
     * 原始 JSON 資訊
     * @var string
     */
    protected $raw_payload;

    static public function parseRaw(string $payload)
    {
        $decoded = json_decode($payload);

        return (new JkoConfirmResponse)
            ->setRawPayload($payload)
            ->setPlatformOrderId($decoded->platform_order_id ?? null);
    }

    public function getPlatformOrderId() {
        return $this->platform_order_id;
    }
    
    public function setPlatformOrderId($platform_order_id) {
        $this->platform_order_id = $platform_order_id;
        return $this;
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