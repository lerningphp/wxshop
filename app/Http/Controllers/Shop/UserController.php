<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\order;
use App\Model\user;
use App\Model\order_detail;
use App\Model\address;
use App\Model\cart;
use App\Model\goods;

class UserController extends Controller
{
    /*
    * 我的潮购
    */
    public function userpage()
    {
        $order_model = new order;
        $dataInfo=$order_model
            ->join('user','user.user_id','=','order.user_id')
            ->where(['order.user_id'=>session('user_id')])
            ->first();
//          $data = Order::where('user_id',session('user_id'))->first();
//          dump($dataInfo);die;
        return view('userpage',['dataInfo'=>$dataInfo]);
    }

    /**
     * 潮购记录
     */
    public function record()
    {
        $data = order_detail::where('user_id',session('user_id'))->first();
        return view('recorddetail',['data'=>$data]);
    }

    /**
     * 我的晒单
     */
    public function share()
    {
        $order_model = new order;
        $userInfo=$order_model
            ->join('user','user.user_id','=','order.user_id')
            ->where(['order.user_id'=>session('user_id')])
            ->first();
        $data = order_detail::where('user_id',session('user_id'))->first();
        return view('sharedetail',['data'=>$data],['userInfo'=>$userInfo]);
    }

    /**
     * 我的钱包
     */
    public function mywallet()
    {
        return view('mywallet');
    }
    /**
     * 我的收货地址
     */
    public function address()
    {
        $addressInfo = address::where('user_id',session('user_id'))->get();
        return view('address',['addressInfo'=>$addressInfo]);
    }

    /**
     * 结算
     */
    public function payment()
    {
        $cartmodel=new cart;
        $goodsmodel=new goods;
        $data=$cartmodel
            ->join('goods','cart.goods_id','=','goods.goods_id')
            ->where(['user_id'=>session('user_id'),'cart_status'=>1])
            ->get();
//        print_r($data);die;

        $allprice = '0';
        foreach($data as $k=>$v){
            $allprice += $v['self_price']*$v['buy_number'];
        }
//        dump($allprice);die;
        return view('payment',['data'=>$data],['allprice'=>$allprice]);
    }

    /**
     * 支付成功
     */
    public function paysuccess()
    {
        $data = Goods::where('is_hot',1)->get();
        return view('paysuccess',['data'=>$data]);
    }

    /**
     * 添加地址
     */
    public function writeaddr()
    {
        return view('writeaddr');
    }

}
