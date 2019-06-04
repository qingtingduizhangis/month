<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Goods extends Model
{
    //添加活动入数据库
    public function addActivedb($arr){
        return DB::table('buy_active')->insertGetId([
            'a_name'     => $arr['a_name'],
            'a_price'    => $arr['a_price'],
            'g_price'    => $arr['g_price'],
            'a_people'   => $arr['a_people'],
            'a_num'      => $arr['a_num'],
            'start_time' => $arr['start_time'],
            'end_time'   => $arr['end_time'],
            'status'     => $arr['status'],
            'a_img'      => $arr['a_img'],
        ]);
    }
    //添加商品数据入库
    public function addGoodsdb($arr){
        return DB::table('goods')->insert([
            'g_name'  => $arr['g_name'],
            'g_price'  => $arr['g_price'],
            'stock_num'  => $arr['stock_num'],
            'g_img'  => $arr['g_img'],
        ]);
    }
    //开启活动
    public function upStatu($id,$arr){
        return DB::table('buy_active')->where(['a_id'=>$id])->update([
            'status'=>$arr['status']
        ]);
    }
    //修改活动
    public function upActivedb($id,$arr){
        return DB::table('buy_active')->where(['a_id'=>$id])->update([
            'a_name'     => $arr['a_name'],
            'a_price'    => $arr['a_price'],
            'g_price'    => $arr['g_price'],
            'a_people'   => $arr['a_people'],
            'a_num'      => $arr['a_num'],
            'start_time' => $arr['start_time'],
            'end_time'   => $arr['end_time'],
            'a_img'      => $arr['a_img'],
        ]);
    }
    //查看活动状态
    public function lookStatus($id){
        return DB::table('buy_active')->where(['a_id'=>$id])->first();
    }
    //删除活动
    public function delActivedb($id){
        return DB::table('buy_active')->where(['a_id'=>$id])->delete();
    }
    //查询活动列表
    public function lookActive(){
        return DB::table('buy_active')->get();
    }
    //详情页
    public function lookGoods($id){
        return DB::table('buy_active')->where(['a_id'=>$id])->first();
    }
}
