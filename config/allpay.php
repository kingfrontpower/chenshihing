<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2016/10/4
 * Time: 下午 03:14
 */

//複製vendor/scottchayaa/allpay/src/Config裡面的範例檔案內容

return [
    //以下為測試付款頁面，正式付款網址為https://payment.allpay.com.tw/Cashier/AioCheckOut
    'ServiceURL' => 'http://payment-stage.allpay.com.tw/Cashier/AioCheckOut',
    //以下為測試金鑰，換成自己的即可收款，金鑰資訊可至歐付寶帳戶/廠商後台/系統開發管理/系統介接設定裡面有詳細資訊
    'HashKey'    => '5294y06JbISpM5x9',
    'HashIV'     => 'v77hoKGq4kWxNNIS',
    'MerchantID' => '2000132',

];