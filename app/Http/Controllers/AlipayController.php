<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\alipay\wappay\service\AlipayTradeService;
use App\Tools\alipay\wappay\buildermodel\AlipayTradeWapPayContentBuilder;
//use app\Tools\alipay\wappay\buildermodel\AlipayTradeWapPayContentBuilder；

class AlipayController extends Controller
{
    /**
     * 手机支付
     */
    public function mobilepay()
    {
        header("Content-type: text/html; charset=utf-8");

        $config =config('alipay');

        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = date('YmdHis').rand(11111,99999);
//        dd($out_trade_no);die;
        //订单名称，必填
        $subject = "全翡翠款iphone max 512G";

        //付款金额，必填
        $total_amount = '7777777';

        //商品描述，可空
        $body = '国际私人定制，最新限量款手机';

        //超时时间
        $timeout_express = "1m";

        $payRequestBuilder = new AlipayTradeWapPayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setOutTradeNo($out_trade_no);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setTimeExpress($timeout_express);

        $payResponse = new AlipayTradeService($config);
        $result = $payResponse->wapPay($payRequestBuilder, $config['return_url'], $config['notify_url']);

        return;
    }

    /**
     * 同步回调地址
     */
    public function re()
    {
        echo 2;
    }
    /**
     * 异步回调地址
     */
    public function notify()
    {
        echo 3;
    }
}
