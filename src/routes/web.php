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

use App\Mail\SampleMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use 認証\プレゼンテーション\コントローラ\SNSログインコントローラ;
use 認証\プレゼンテーション\コントローラ\会員ユーザ紐付けコントローラ;
use 商品\プレゼンテーション\コントローラ\一覧コントローラ as 商品一覧コントローラ;
use 商品\プレゼンテーション\コントローラ\登録コントローラ as 商品登録コントローラ;
use 商品\プレゼンテーション\コントローラ\詳細コントローラ as 商品詳細コントローラ;
use 商品\プレゼンテーション\コントローラ\編集コントローラ as 商品編集コントローラ;
use 商品カテゴリ\プレゼンテーション\コントローラ\一覧コントローラ as 商品カテゴリ一覧コントローラ;
use 商品カテゴリ\プレゼンテーション\コントローラ\登録コントローラ as 商品カテゴリ登録コントローラ;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login/{sns_name}', SNSログインコントローラ::class)->where('SNS名', 'google');
Route::get('login/{sns_name}/callback', 会員ユーザ紐付けコントローラ::class)->where('SNS名', 'google');

Route::get('/item', 商品一覧コントローラ::class);
Route::get('/item_detail/{id}', 商品詳細コントローラ::class);
Route::post('/item/edit/{id}', 商品編集コントローラ::class);
Route::get('/item/register', function () {
    return view('商品.登録');
});
Route::post('/item/register', 商品登録コントローラ::class);

Route::get('/category', 商品カテゴリ一覧コントローラ::class);
Route::get('/category/register', function () {
    return view('商品カテゴリ.登録');
});
Route::post('/category/register', 商品カテゴリ登録コントローラ::class);

Route::get('/hello/', 'HelloController@index')->name('hello');
Route::post('/hello/other', 'HelloController@other');
Route::get('/sample', 'Sample\SampleController@index')->name('sample');

Route::get('hello/auth', 'HelloController@getAuth');
Route::post('hello/auth', 'HelloController@postAuth');
Route::get('hello/session', 'HelloController@ses_get');
Route::post('hello/session', 'HelloController@ses_put');
Route::get('person', 'PersonController@index');
Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');
Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');
Route::get('person/edit', 'PersonController@edit');
Route::post('person/edit', 'PersonController@update');
Route::get('person/del', 'PersonController@delete');
Route::post('person/del', 'PersonController@remove');
Route::get('board', 'BoardController@index');
Route::get('board/add', 'BoardController@add');
Route::post('board/add', 'BoardController@create');
Route::resource('rest', 'RestappController');

Route::get('/sample_mail', function () {
    Mail::to('sample@example.com')->send(new SampleMail);
    return '送信完了!';
});
