# 街口支付 PHP SDK

## 安装

```shell
composer require kurorido/jkopay-php-sdk
```

## 訂單創建 Entry API

```php
$StoreId = '商店編號';
$PlatformOrderId = '電商平台端交易序號';
$ConfirmUrl = '買家在街口確認付款頁面輸入密碼後，街口服務器訪問此電商平台服務器網址確認訂單正確性與存貨彈性';
$ResultUrl = '消費者付款完成後，街口服務器訪問此電商平台服務器網址，並在參數中提供街口交易序號與訂單交易狀態代碼';
$ResultDisplayUrl = '消費者付款完成後點選完成按鈕，將消費者導向此電商平台客戶端付款結果頁網址';

$Price = 9999;

$JkoPayService = new \Jkopay\JkoPayService(
    api_key: $api_key,
    secret_key: $secret_key,
    testing: false,
);

$response = $JkoPayService->sendCheckout(
    (new \Jkopay\JkoCheckoutRequest())
        ->setStoreId($StoreId)
        ->setPlatformOrderId($PlatformOrderId)
        ->setTotalPrice($Price)
        ->setFinalPrice($Price)
        ->setConfirmUrl($ConfirmUrl)
        ->setResultUrl($ResultUrl)
        ->setResultDisplayUrl($ResultDisplayUrl)
        ->setProducts([
            (new \Jkopay\JkoProduct(
                name: '測試商品',
                img: '',
                unit_count: 1,
                unit_price: $Price,
                unit_final_price: $Price
            ))
        ])
);

$response->getPaymentUrl();
```

## Confirm URL Callback

```php
$confirmation = \Jkopay\JkoConfirmResponse::parseRaw($json);
$platform_order_id = $confirmation->getPlatformOrderId();
// 回覆訂單是否可以允許扣款
```

## Result URL Callback

```php
$result = \Jkopay\JkoResultResponse::parseRaw($json);
$transaction = $result->getTransaction();
$platform_order_id = $transaction->getPlatformOrderId();
$status = $transaction->getStatus(); // 請參照 OrderStatusCode
```