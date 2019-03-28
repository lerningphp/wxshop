<?php
return [
		//应用ID,您的APPID。
		'app_id' => "2016092500594399",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEpgIBAAKCAQEAwxob+R490U+0VFRHrfFUwZO1ZFI5NsH5tevk3luAOAwVm/cNcyVsF1KESYFJO88ZBkEyuW1crGok520XiLuaVm/7mpl4sPzAU2OxGbOAHXzi1fFBPXkn5PUWLPHA6mGztSpAaKhlGlsB4LrmQG744OgDYg/omeOqYfOtutTU3UyW2F4o+Ey6l++Dk+6U5yaucteZ3FXVtywxTWJfsQBy5FAHAiowNtcMmHG3Lq+qevFuqLKg49K8O8hA71+AsKX/jw11LgHQ/lawte5BVrTF1V89U2tKmoLRBfbAS6ntqMwNB0bJnxKaJRb2tC3VAT9d84NXpkA4NkkMP9oJ4TLhCwIDAQABAoIBAQCu3tcVydJUqqESONxqfvWd7/vUqJIZj3F3arEf0FmzYrl3qs9GVtN0cAScMaJnVi+y2HtTkj9PVnAvcit25dfnA8Y7grWXxWPJGoDhbW82fvp+EhiMtexZHoe6zxE/w0Sk6/MBG3ZLUijzufGo7Q5r3+kwWtv8GwBbfWNJI3yLwIcFwVuiSe+WcaX7TUnNbRMo0U5fnM7iKFR/H/2Wf50O/17OmOKNmv6LRjscgvn4VnCWuHzoCJgGMtQrKydRSep/Dw0TgyqxGA9RIQZ4YZ4TXn18peh0Caixr4nOqVpeJVpdNkoS4WsQ4Ybiw3HqQ4uMjUQDfnrcQf8BFNPTb22RAoGBAP83j5Af/v6DvTHYDLazEI3N9VFwiy/i/dDP8A/D8QmsASkhpY5s0JJUrx5z2DMrYgjPpHYISCZ3wT3AMj9lvGrTtzCyYT6XB15PkdAHn6OYyZHvcLNhPUwwDdr8gLiiwZwx0IygT4TQi50bC3KnW9wJAeFUpKbHUUF5W2suKhZpAoGBAMOzVghQYD1h6wt4/Qk4I9gkmK/D8CJU42+wa9iUzriZsDKEH4BUbG5Ap16p2DoEUwDfv8Mfm8plLZNnLDuuitGvOk4lkiMNdsu/EawUpyZ+ncfTnnSTspT1h/2ssJQouDJRjmuR0NVaEV4NCFZOe0Q9VR2r4kXJVYVayNfnHxVTAoGBAOPJNjQ/qnqFIE6lcyt5hLPb+DFYzpHN+hXuEWgwzSiBwYNxiW8mBb4lISt/355EATq2ASZr2+GhjvLLYM2ewt1h2yX2f766U5REVnMi6sO8MWQ0HhWsG2atmSAzr7ubYExFVcq9plt3OrTdF4mcf+tSisAPqOlGCmryorp1uJDJAoGBAIboy2dB2YaXSQyIpI9Fd1haqjOI9LMGKB/n1ADjXLrfoBrDAGBcUr+SrI7SsXAVaQ8SMEUYNjLJmyihmFmwUpyImr4iomKttnZwyoMBXdVoteZ6mSKuaw7LUKts7/HDPG/bzz2SsQ9TXuOiQlwVEF8TlOi2hG8tg1pCInDMMJ5nAoGBAI3DjYRvw4FIsBTYOG/oZzSL7+ySGfH1/aj0uMqM8Tw8DbNfa9Li5ohDxhJFdQtylGSXwG3+hPYBVqQsHRyP4detn2gKsaebx+5pf5VwRzoUvfP5w4/qATC7R2t9GhTXCPePGkTC5Vw4zLUjiio8P9uGxK0gwMr0B/fBbIjIQT4u",
		
		//异步通知地址
		'notify_url' => "http://www.wxshop.com/alipay/notify",
		
		//同步跳转
		'return_url' => "http://www.wxshop.com/alipay/return",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwxob+R490U+0VFRHrfFUwZO1ZFI5NsH5tevk3luAOAwVm/cNcyVsF1KESYFJO88ZBkEyuW1crGok520XiLuaVm/7mpl4sPzAU2OxGbOAHXzi1fFBPXkn5PUWLPHA6mGztSpAaKhlGlsB4LrmQG744OgDYg/omeOqYfOtutTU3UyW2F4o+Ey6l++Dk+6U5yaucteZ3FXVtywxTWJfsQBy5FAHAiowNtcMmHG3Lq+qevFuqLKg49K8O8hA71+AsKX/jw11LgHQ/lawte5BVrTF1V89U2tKmoLRBfbAS6ntqMwNB0bJnxKaJRb2tC3VAT9d84NXpkA4NkkMP9oJ4TLhCwIDAQAB",

//        标识沙箱环境
        "mode"=>'dev',
	
];