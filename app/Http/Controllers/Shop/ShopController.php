<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\goods;
use App\Model\category;

class ShopController extends Controller
{
    //全部商品页
    public function allshops($id)
    {

        $cateInfo = Category::where('pid',0)->get();
//        echo $id;die;
        if($id!=0){
            $cateInfos = Category::all();
            $c_id = $this->getSonCateId($cateInfos,$id);
            $goodsInfo = Goods::where('is_up',1)->whereIn('cate_id',$c_id)->get();
        }else{
            $goodsInfo = Goods::where('is_up',1)->get();
        }
        return view('allshops',['cateInfo'=>$cateInfo],['goodsInfo'=>$goodsInfo]);
    }


    /**
     * 商品详情页
     */
    public function shopcontent($id)
    {

        $goodsInfo = Goods::where('goods_id',$id)->first();
//        dump($goodsInfo);die;
//        $goodsInfos = $goodsInfo->toArray();
        $images=rtrim($goodsInfo['goods_imgs'],"|");
        $imgs=explode('|',$images);
//        dd($imgs);die;
        return view('shopcontent',['goodsInfo'=>$goodsInfo],['imgs'=>$imgs]);
    }

    /**
     * 获取所有分类id
     */
    public function getSonCateId($cateInfo,$pid)
    {
//        dd($cateInfo);die;
        static $id = [];
        foreach($cateInfo as $k=>$v){
            if($v['pid']==$pid){
                $id[] = $v['cate_id'];
                $this->getSonCateId($cateInfo,$v['cate_id']);
            }
        }
        return $id;
    }
    /**
     * ajax查询
     */
    public function shopajax(Request $request)
    {
        $cate_id=$request->cate_id;
//        echo $cate_id;

        $cateInfos = Category::all();
        $c_id = $this->getSonCateId($cateInfos,$cate_id);
        $goodsInfo = Goods::where('is_up',1)->whereIn('cate_id',$c_id)->get();

        return view("shopdiv",['goodsInfo'=>$goodsInfo]);


    }

    /**
     * ajax查询热卖中的商品
     */
    public function ishot(Request $request)
    {
        $goodsInfo = Goods::where('is_hot',1)->get();
        return view('shopdiv',['goodsInfo'=>$goodsInfo]);
    }
    /**
     * ajax查询热卖中的商品
     */
    public function isnew(Request $request)
    {
        $goodsInfo = Goods::where('is_new',1)->get();
        return view('shopdiv',['goodsInfo'=>$goodsInfo]);
    }
    /**
     * ajax查询价格升序降序
     */
    public function price(Request $request)
    {
        $type = $request->type;

        if($type=='1'){
            $goodsInfo = Goods::orderby('self_price','ASC')->get();
        }else{
            $goodsInfo = Goods::orderby('self_price','DESC')->get();
        }
//        dd($goodsInfo);die;
        return view('shopdiv',['goodsInfo'=>$goodsInfo]);
    }


}
