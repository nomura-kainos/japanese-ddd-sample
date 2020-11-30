<?php

declare(strict_types=1);

namespace 注文\インフラ\エロクアント;

use Illuminate\Database\Eloquent\Model;

/*
 * https://readouble.com/laravel/5.7/ja/eloquent-mutators.html
 */
class 注文明細エロクアント extends Model
{
    // テーブル名を指定する
    protected $table = '注文明細';

    // INSERT時の自動採番の有無を指定する
    public $incrementing = false;

    // フィールドの属性キャストを指定(未指定の場合stringになる)
    protected $casts = [
        '注文id' => 'int',
        '行番号' => 'int',
        '商品id' => 'int',
        '商品名' => 'string',
        '数量' => 'int',
        '総額' => 'int',
    ];

    // 代入可能なフィールドを指定する
    protected $fillable = ['注文id', '行番号', '商品id', '商品名', '数量', '総額'];
}
