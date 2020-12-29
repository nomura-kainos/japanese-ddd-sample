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

use Illuminate\Support\Facades\Route;
use カート\プレゼンテーション\コントローラ\カートに入れるコントローラ;
use カート\プレゼンテーション\コントローラ\カート内商品削除コントローラ;
use カート\プレゼンテーション\コントローラ\一覧コントローラ as カート一覧コントローラ;
use 注文\プレゼンテーション\コントローラ\注文を確定するコントローラ;
use 特集\プレゼンテーション\コントローラ\一覧コントローラ as 特集一覧コントローラ;
use 特集\プレゼンテーション\コントローラ\登録コントローラ as 特集登録コントローラ;
use 特集\プレゼンテーション\コントローラ\詳細コントローラ as 特集詳細コントローラ;
use 認証\プレゼンテーション\コントローラ\SNSログインコントローラ;
use 認証\プレゼンテーション\コントローラ\ユーザ登録コントローラ;
use 認証\プレゼンテーション\コントローラ\ユーザ登録フォーム表示コントローラ;
use 認証\プレゼンテーション\コントローラ\パスワードリセット\リンク表示コントローラ;
use 認証\プレゼンテーション\コントローラ\パスワードリセット\リセット用メール送信コントローラ;
use 認証\プレゼンテーション\コントローラ\パスワードリセット\フォーム表示コントローラ;
use 認証\プレゼンテーション\コントローラ\パスワードリセット\パスワードリセットコントローラ;
use 認証\プレゼンテーション\コントローラ\ログアウトコントローラ;
use 認証\プレゼンテーション\コントローラ\会員ユーザ紐付けコントローラ;
use 商品\プレゼンテーション\コントローラ\一覧コントローラ as 商品一覧コントローラ;
use 商品\プレゼンテーション\コントローラ\登録フォーム表示コントローラ as 商品登録フォーム表示コントローラ;
use 商品\プレゼンテーション\コントローラ\登録コントローラ as 商品登録コントローラ;
use 商品\プレゼンテーション\コントローラ\詳細コントローラ as 商品詳細コントローラ;
use 商品\プレゼンテーション\コントローラ\編集コントローラ as 商品編集コントローラ;
use 商品カテゴリ\プレゼンテーション\コントローラ\大カテゴリ\一覧コントローラ as 大カテゴリ一覧コントローラ;
use 商品カテゴリ\プレゼンテーション\コントローラ\大カテゴリ\登録コントローラ as 大カテゴリ登録コントローラ;
use 商品カテゴリ\プレゼンテーション\コントローラ\小カテゴリ\一覧コントローラ as 小カテゴリ一覧コントローラ;
use 商品カテゴリ\プレゼンテーション\コントローラ\小カテゴリ\登録コントローラ as 小カテゴリ登録コントローラ;
use 認証\プレゼンテーション\コントローラ\入力してログインコントローラ;
use 認証\プレゼンテーション\コントローラ\ログインフォーム表示コントローラ;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/user/login', ログインフォーム表示コントローラ::class)->name('login');
Route::post('/user/login', 入力してログインコントローラ::class);
Route::post('/user/logout', ログアウトコントローラ::class)->name('logout');
Route::get('/user/login/{sns_name}', SNSログインコントローラ::class)->where('SNS名', 'google|facebook|amazon');
Route::get('/user/login/{sns_name}/callback', 会員ユーザ紐付けコントローラ::class)->where('SNS名', 'google|facebook|amazon');

Route::get('/user/register', ユーザ登録フォーム表示コントローラ::class)->name('register');
Route::post('/user/register', ユーザ登録コントローラ::class);

Route::get('/user/password/reset', リンク表示コントローラ::class)->name('password.request');
Route::post('/user/password/email', リセット用メール送信コントローラ::class)->name('password.email');
Route::get('/user/password/reset/{token}', フォーム表示コントローラ::class)->name('password.reset');
Route::post('/user/password/reset', パスワードリセットコントローラ::class)->name('password.update');

Route::get('/item', 商品一覧コントローラ::class);
Route::get('/item_detail/{id}', 商品詳細コントローラ::class);
Route::post('/item/edit/{id}', 商品編集コントローラ::class);
Route::get('/item/register', 商品登録フォーム表示コントローラ::class);
Route::post('/item/register', 商品登録コントローラ::class);

Route::get('/report', 特集一覧コントローラ::class)->name('report');
Route::get('/report_detail/{id}', 特集詳細コントローラ::class);
Route::get('/report/register', function () {
    return view('特集.登録');
});
Route::post('/report/register', 特集登録コントローラ::class);

Route::post('/order', 注文を確定するコントローラ::class);

Route::get('/category/big', 大カテゴリ一覧コントローラ::class)->name('category');
Route::get('/category/small/{big_category_id}', 小カテゴリ一覧コントローラ::class);
Route::get('/category/big/register', function () {
    return view('商品カテゴリ.大カテゴリ.登録');
});
Route::post('/category/big/register', 大カテゴリ登録コントローラ::class);
Route::get('/category/small/register/{big_category_id}', function ($大カテゴリid) {
    return view('商品カテゴリ.小カテゴリ.登録', ['大カテゴリid' => $大カテゴリid]);
});
Route::post('/category/small/register', 小カテゴリ登録コントローラ::class);


Route::get('/cart', カート一覧コントローラ::class)->name('cart');
Route::post('/cart/add', カートに入れるコントローラ::class);
Route::get('/cart/remove', function () {
    return view('カート.一覧');
});
Route::post('/cart/remove', カート内商品削除コントローラ::class);

