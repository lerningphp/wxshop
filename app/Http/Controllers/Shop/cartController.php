<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\goods;
use App\Model\cart;
class cartController extends Controller
{
    /**
     * 商品添加到购物车
     */
    public function cartadd(Request $request)
    {
        $goods_id = $request->goods_id;
        $user_id = session('user_id');
        $cartmodel = new cart;
        $goodsmodel = new goods;
        $goodsInfo = $goodsmodel->where(['goods_id'=>$goods_id])->first();
//        print_r($goodsInfo);die;
        $arr = $cartmodel->where(['goods_id'=>$goods_id,'user_id'=>$user_id,'cart_status'=>1])->first();
//       print_r($arr);die;

        if(empty($arr)){
            if($goodsInfo->goods_num>=1){
                $data['goods_id']=$goods_id;
                $data['user_id']=$user_id;
                $data['buy_number']=1;
                $data['create_time']=time();
                $res = $cartmodel->insert($data);
                if($res){
                    echo json_encode(['font'=>"添加成功",'code'=>1]);exit;
                }else{
                    echo json_encode(['font'=>'添加失败','code'=>2]);exit;
                }
            }else{
                echo json_encode(['font'=>'库存不足','code'=>2]);exit;
            }
        }else{
            if($goodsInfo->goods_num > $arr->buy_number){
                $arr->buy_number = $arr->buy_number+1;
                $res = $arr->save();
                if($res){
                    echo json_encode(['font'=>"添加成功",'code'=>1]);exit;
                }else{
                    echo json_encode(['font'=>'添加失败','code'=>2]);exit;
                }
            }else{
                echo json_encode(['font'=>'库存不足','code'=>2]);exit;
            }
        }
    }

    /*
     * 购物车
     * */
    public function shopcart()
    {
        $cartmodel=new cart;
        $goodsmodel=new goods;
        $goodsinfo=$goodsmodel->where('is_hot',1)->get();
        $data=$cartmodel
            ->join('goods','cart.goods_id','=','goods.goods_id')
            ->where(['user_id'=>session('user_id'),'cart_status'=>1])
            ->orderBy('cart.create_time','desc')
            ->get();

        return view('shopcart',['data'=>$data],['goodsinfo'=>$goodsinfo]);

    }

    /**
     * 数量修改
     */
    public function changenum(Request $request)
    {

    }
}
