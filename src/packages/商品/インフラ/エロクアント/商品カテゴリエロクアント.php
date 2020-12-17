<?php

declare(strict_types=1);

namespace 商品\インフラ\エロクアント;

use Illuminate\Database\Eloquent\Model;

/*
 * https://readouble.com/laravel/5.7/ja/eloquent-mutators.html
 */
class 商品カテゴリエロクアント extends Model
{

    // テーブル名を指定する
    protected $table = '商品カテゴリ';

    // INSERT時の自動採番の有無を指定する
    public $incrementing = false;

    // フィールドの属性キャストを指定(未指定の場合stringになる)
    protected $casts = [
        'id' => 'int',
        '名前' => 'string',
    ];

    // 代入可能なフィールドを指定する
    protected $fillable = ['id', '名前'];

    // 代入不可なフィールドを指定する
    protected $guarded = ['created_at', 'updated_at'];
}
