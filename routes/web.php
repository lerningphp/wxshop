<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**
 * @content 商城首页
 */
route::any('/index','IndexController@index');
//登录静态页面
route::any('/login','IndexController@login');
route::any('/logindo','IndexController@logindo');
//注册静态页面
route::any('/register','IndexController@register');
//注册执行
route::any('/registerdo','IndexController@registerdo');
//手机号发送短信验证码
route::post('index/phone','IndexController@phone');
route::any('verify/create','CaptchaController@create');

/**
 * @content 商城页面路由组
 */
Route::prefix('index')->group(function (){
    route::get('allshops/{id?}','Shop\shopController@allshops');

    route::get('userpage','Shop\shopController@userpage')->middleware('logs');
    route::get('shopcontent/{id?}','Shop\shopController@shopcontent');
    route::post('shopAjax','Shop\shopController@shopAjax');
    route::post('ishot','Shop\shopController@ishot');
    route::post('isnew','Shop\shopController@isnew');
    route::post('price','Shop\shopController@price');
});

/**
 * 购物车页面路由组
 */
Route::prefix('cart')->group(function (){
    route::post('cartadd','Shop\cartController@cartadd');
    route::get('shopcart/{id?}','Shop\cartController@shopcart')->middleware('logs');

});