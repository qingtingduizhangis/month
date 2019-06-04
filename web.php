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

Route::get('/', function () {
    return view('welcome');
});

Route::post('index/index','IndexController@index')->name('index.index');
Route::post('index/add','IndexController@add')->name('index.add');
Route::get('index/gets','IndexController@gets')->name('index.gets');
Route::get('index/del','IndexController@del')->name('index.del');
Route::post('index/up','IndexController@up')->name('index.up');
Route::post('index/yuding','IndexController@yuding')->name('index.yuding');
Route::post('index/imgsc','IndexController@imgsc')->name('index.imgsc');



Route::post('one/add','OneController@add')->name('one.add');
Route::get('one/getdata','OneController@getdata')->name('one.getdata');
Route::get('one/search','OneController@search')->name('one.search');
Route::get('one/createSou','OneController@createSou')->name('one.createSou');
Route::get('one/getes','OneController@getes')->name('one.getes');
Route::get('one/del','OneController@del')->name('one.del');
Route::post('one/up','OneController@up')->name('one.up');
Route::get('one/ceshi','OneController@ceshi')->name('one.ceshi');

//月考
Route::post('goods/addActive','GoodsController@addActive')->name('goods.addActive');
Route::post('goods/addGoods','GoodsController@addGoods')->name('goods.addGoods');
Route::post('goods/openActive','GoodsController@openActive')->name('goods.openActive');
Route::post('goods/endActive','GoodsController@endActive')->name('goods.endActive');
Route::post('goods/upActive','GoodsController@upActive')->name('goods.upActive');
Route::get('goods/delActive','GoodsController@delActive')->name('goods.delActive');
Route::get('goods/lookActive','GoodsController@lookActive')->name('goods.lookActive');
Route::get('goods/listActive','GoodsController@listActive')->name('goods.listActive');
Route::get('goods/listGoods','GoodsController@listGoods')->name('goods.listGoods');
Route::get('goods/addAcform','GoodsController@addAcform')->name('goods.addAcform');
Route::post('goods/addAc','GoodsController@addAc')->name('goods.addAc');
Route::get('goods/getEs','GoodsController@getEs')->name('goods.getEs');
Route::get('goods/getEslist','GoodsController@getEslist')->name('goods.getEslist');
Route::post('goods/upTeam','GoodsController@upTeam')->name('goods.upTeam');



















