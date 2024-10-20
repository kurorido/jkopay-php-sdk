<?php

namespace Jkopay;

class JkoUtils
{
    static public function sign(string $payload, string $secret_key)
    {
        return hash_hmac('sha256', $payload, $secret_key);
    }
}