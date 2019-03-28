<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\goods;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class GoodsController extends Controller
{
    //考试搜索页
    public function index(Request $request)
    {
//        $search = $request->search;
//        Cache::flush();die;
        $search = $request->search;
        $page = $request->input('page',1);
        $key = $search.$page;

//        if(Cache::has($key)){
//            $goodsInfo = Cache::get($key);
//            echo "from memcache";
//        }else{
//            $goodsInfo = Goods::where('goods_name','like',"%$search%")->paginate(5);
//            Cache::put($key,$goodsInfo,1000);
//            echo "from db";
//        }
//        $redis = new Redis();
//        $redis->connect('127.0.0.1', 6379);
        if(Redis::exists($key)){
            $goodsInfo = unserialize(Redis::get($key));
            echo "from redis";
        }else{
            $goodsInfo = Goods::where('goods_name','like',"%$search%")->paginate(5);
            Redis::set($key,serialize($goodsInfo));
            Redis::expire($key,1000);
            echo "from db";
        }


        return view('goods.index',['goodsInfo'=>$goodsInfo,'search'=>$search]);
    }
}
