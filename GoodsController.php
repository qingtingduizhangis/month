<?php

namespace App\Http\Controllers;
use Elasticsearch\ClientBuilder;
use App\Http\Models\Goods;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    protected $result;
    protected $client;
    public function __construct(){
        $hosts = [
            'localhost:9200',         // IP + Port
        ];
        $this->client = ClientBuilder::create()           // Instantiate a new ClientBuilder
        ->setHosts($hosts)      // Set the hosts
        ->build();              // Build the client object
    }

    //添加活动接口
    public function addActive(Request $request){
        $arr['a_name'] = $request->post('a_name');
        $arr['a_price'] = $request->post('a_price');
        $arr['g_price'] = $request->post('g_price');
        $arr['a_people'] = $request->post('a_people');
        $arr['a_num'] = $request->post('a_num');
        $arr['start_time'] = $request->post('start_time');
        $arr['end_time'] = $request->post('end_time');
        $arr['status'] = $request->post('status');
        $photo = $request->file('a_img');
        $arr['a_img'] = $photo->store('a_img');
        $m = new Goods();
        $res = $m->addActivedb($arr);
        if ($res){
            $params = [
                'index' => 'active_index',
                'type' => 'active_type',
                'id' => $res,
                'body' => $arr
            ];
            $response = $this->client->index($params);
            print_r($response);
            $this->result['code'] = '200';
            $this->result['msg']  = 'ok';
            $this->result['data'] = '添加活动成功';
            return $this->result;
        }else{
            $this->result['code'] = '10001';
            $this->result['msg']  = 'error';
            $this->result['data'] = '添加活动失败';
            return $this->result;
        }
    }
    //商品添加接口
    public function addGoods(Request $request){
        $arr['g_name'] = $request->post('g_name');
        $arr['g_price'] = $request->post('g_price');
        $arr['stock_num'] = $request->post('stock_num');
        $photo = $request->file('g_img');
        $arr['g_img'] = $photo->store('g_img');
        $m = new Goods();
        $res = $m->addGoodsdb($arr);
        if ($res){
            $this->result['code'] = '200';
            $this->result['msg']  = 'ok';
            $this->result['data'] = '添加商品成功';
            return $this->result;
        }else{
            $this->result['code'] = '10002';
            $this->result['msg']  = 'error';
            $this->result['data'] = '添加商品失败';
            return $this->result;
        }
    }
    //开始活动
    public function openActive(Request $request){
        $id = $request->post('a_id');
        $arr['status'] = $request->post('status');
        $m = new Goods();
        $res = $m->upStatu($id,$arr);
        if ($res){
            $params = [
                'index' => 'active_index',
                'type' => 'active_type',
                'id' => $id,
                'body' => $arr
            ];
            $response = $this->client->index($params);
            print_r($response);
            $this->result['code'] = '200';
            $this->result['msg']  = 'ok';
            $this->result['data'] = '活动开启成功';
            return $this->result;
        }else{
            $this->result['code'] = '10003';
            $this->result['msg']  = 'error';
            $this->result['data'] = '活动开启失败';
            return $this->result;
        }
    }
    //结束活动
    public function endActive(Request $request){
        $id = $request->post('a_id');
        $arr['status'] = $request->post('status');
        $m = new Goods();
        $res = $m->upStatu($id,$arr);
        if ($res){
            $params = [
                'index' => 'active_index',
                'type' => 'active_type',
                'id' => $id,
                'body' => $arr
            ];
            $response = $this->client->index($params);
            print_r($response);
            $this->result['code'] = '200';
            $this->result['msg']  = 'ok';
            $this->result['data'] = '活动结束成功';
            return $this->result;
        }else{
            $this->result['code'] = '10004';
            $this->result['msg']  = 'error';
            $this->result['data'] = '活动结束失败';
            return $this->result;
        }
    }
    //修改活动
    public function upActive(Request $request){
        $id = $request->post('a_id');
        $arr['a_name']      = $request->post('a_name');
        $arr['a_price']     = $request->post('a_price');
        $arr['g_price']     = $request->post('g_price');
        $arr['a_people']    = $request->post('a_people');
        $arr['a_num']       = $request->post('a_num');
        $arr['start_time']  = $request->post('start_time');
        $arr['end_time']    = $request->post('end_time');
        $photo = $request->file('a_img');
        $arr['a_img'] = $photo->store('a_img');
        $m = new Goods();
        //查看活动是否开启
        $row = $m->lookStatus($id);
        $status_active = $row->status;
        if ($status_active == '活动开始'){
            $this->result['code'] = '10006';
            $this->result['msg']  = 'error';
            $this->result['data'] = '活动正在进行，不能修改';
            return $this->result;
        }else{
            $res = $m->upActivedb($id,$arr);
            if ($res){
                $params = [
                    'index' => 'active_index',
                    'type' => 'active_type',
                    'id' => $id,
                    'body' => $arr
                ];
                $response = $this->client->index($params);
                print_r($response);
                $this->result['code'] = '200';
                $this->result['msg']  = 'ok';
                $this->result['data'] = '修改活动成功';
                return $this->result;
            }else{
                $this->result['code'] = '10005';
                $this->result['msg']  = 'error';
                $this->result['data'] = '修改活动失败';
                return $this->result;
            }
        }
    }
    //删除活动
    public function delActive(Request $request){
        $id = $request->get('a_id');
        $m = new Goods();
        //查看活动是否开启
        $row = $m->lookStatus($id);
        $status_active = $row->status;
        if ($status_active == '活动开始'){
            $this->result['code'] = '10007';
            $this->result['msg']  = 'error';
            $this->result['data'] = '活动正在进行，不能删除';
            return $this->result;
        }else{
            $res = $m->delActivedb($id);
            if ($res){
                $params = [
                    'index' => 'active_index',
                    'type' => 'active_type',
                    'id' => $id,
                ];
                $response = $this->client->delete($params);
                print_r($response);
                $this->result['code'] = '200';
                $this->result['msg']  = 'ok';
                $this->result['data'] = '修改活动成功';
             //   return $this->result;
            }else{
                $this->result['code'] = '10008';
                $this->result['msg']  = 'error';
                $this->result['data'] = '删除活动失败';
                return $this->result;
            }
        }
    }
    //活动查询接口
    public function lookActive(Request $request){
        $a_name = $request->get('a_name');
        $params = [
            'index' => 'active_index',
            'type' => 'active_type',
            'body' => [
                'from' => 0,
                'size' => 1,
                'query' => [
                    'match' => [
                        'a_name' => $a_name
                    ]
                ]
            ]
        ];
        $response = $this->client->search($params);
        print_r($response);
    }
    //拼团活动列表
    public function listActive(){
        $m = new Goods();
        $res = $m->lookActive();
        return view('goods.listActive',['res'=>$res]);
    }
    //详情列表
    public function listGoods(Request $request){
        $id = $request->get('id');
        $m = new Goods();
        $res = $m->lookGoods($id);
        return view('goods.listGoods',['res'=>$res]);
    }
    //添加表单
    public function addAcform(){
        return view('goods.addAcform');
    }
    //添加
    public function addAc(Request $request){
        $arr['a_name'] = $request->post('a_name');
        $arr['a_price'] = $request->post('a_price');
        $arr['g_price'] = $request->post('g_price');
        $arr['a_people'] = $request->post('a_people');
        $arr['a_num'] = $request->post('a_num');
        $arr['start_time'] = $request->post('start_time');
        $arr['end_time'] = $request->post('end_time');
        $arr['status'] = $request->post('status');
        $photo = $request->file('a_img');
        $arr['a_img'] = $photo->store('a_img');
        $m = new Goods();
        $res = $m->addActivedb($arr);
        if ($res){
            return "<script>alert('添加成功');location.href='listActive';</script>";
        }else{
            return "<script>alert('添加失败');location.href='listActive';</script>";
        }
    }
    //es活动查询接口
    public function getEs(){
        $params = [
            'index' => 'active_index',
            'type' => 'active_type',
        ];
        $response = $this->client->search($params);
        print_r($response);
    }
    //es活动详情接口
    public function getEslist(){
        $params = [
            'index' => 'active_index',
            'type' => 'active_type',
            'id' => 3
        ];
        $response = $this->client->get($params);
        print_r($response);
    }
    //变团长接口
    public function upTeam(Request $request){
    }
}
