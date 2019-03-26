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
    route::get('allshops/{id?}','Shop\ShopController@allshops');
    route::get('shopcontent/{id?}','Shop\ShopController@shopcontent');
    route::post('shopajax','Shop\ShopController@shopajax');
    route::post('ishot','Shop\ShopController@ishot');
    route::post('isnew','Shop\ShopController@isnew');
    route::post('price','Shop\ShopController@price');
});

/**
 * 购物车页面路由组
 */
Route::prefix('cart')->group(function (){
    route::post('cartadd','Shop\CartController@cartadd');
    route::post('cartdel','Shop\CartController@cartdel');
    route::post('changenum','Shop\CartController@changenum');
    route::post('countprice','Shop\CartController@countprice');
    route::get('shopcart/{id?}','Shop\CartController@shopcart')->middleware('logs');
});

/**
 * 我的潮购页面路由组
 */
Route::prefix('user')->group(function (){
    route::get('userpage','Shop\UserController@userpage')->middleware('logs');
    route::get('recorddetail','Shop\UserController@record');
    route::get('sharedetail','Shop\UserController@share');
    route::get('mywallet','Shop\UserController@mywallet');
    route::get('address','Shop\UserController@address');
    route::get('payment','Shop\UserController@payment');
    route::get('writeaddr','Shop\UserController@writeaddr');
    route::get('paysuccess','Shop\UserController@paysuccess');

});