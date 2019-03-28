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
        $addressInfo = address::where('user_id',session('user_id'))->where('address_status',1)->get();
        return view('address',['addressInfo'=>$addressInfo]);
    }

    /**
     * 结算
     */
    public function payment(Request $request)
    {
        $cart_id = $request->ids;
//        print_r($ids);die;
        $cartmodel=new cart;
        $data=$cartmodel
            ->join('goods','cart.goods_id','=','goods.goods_id')
            ->where(['user_id'=>session('user_id'),'cart_status'=>1])
            ->whereIn('cart_id',$cart_id)
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
        $data = goods::where('is_hot',1)->get();
        return view('paysuccess',['data'=>$data]);
    }

    /**
     * 添加地址
     */
    public function writeaddr()
    {
        return view('writeaddr');
    }
    /**
     * 删除地址
     */
    public function deladd(Request $request)
    {
        $address_id = $request->address_id;
        $res = address::where('address_id',$address_id)->where('user_id',session('user_id'))->update(['address_status'=>2]);
        if($res){
            echo json_encode(['code'=>1,'font'=>'删除成功！']);
        }else{
            echo json_encode(['code'=>2,'msg'=>'删除失败！']);
        }

    }

}
