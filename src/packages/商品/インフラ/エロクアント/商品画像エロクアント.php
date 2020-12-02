<?php

declare(strict_types=1);

namespace 商品\インフラ\エロクアント;

use Illuminate\Database\Eloquent\Model;

/*
 * https://readouble.com/laravel/5.7/ja/eloquent-mutators.html
 */
class 商品画像エロクアント extends Model
{

    // テーブル名を指定する
    protected $table = '商品画像';

    // INSERT時の自動採番の有無を指定する
    public $incrementing = false;

    // フィールドの属性キャストを指定(未指定の場合stringになる)
    protected $casts = [
        '商品id' => 'int',
        'ファイル名' => 'string',
        'ファイルパス' => 'string',
    ];

    // 代入可能なフィールドを指定する
    protected $fillable = ['商品id', 'ファイル名', 'ファイルパス'];

    // 代入不可なフィールドを指定する
    protected $guarded = ['created_at', 'updated_at'];
}
