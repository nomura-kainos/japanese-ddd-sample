<?php

declare(strict_types=1);

namespace 共通\イベント履歴;

use Illuminate\Database\Eloquent\Model;

/*
 * https://readouble.com/laravel/5.7/ja/eloquent-mutators.html
 */
class イベント履歴エロクアント extends Model
{
    // テーブル名を指定する
    protected $table = 'イベント履歴';

    // フィールドの属性キャストを指定(未指定の場合stringになる)
    protected $casts = [
        'イベントid' => 'int',
        'イベント名' => 'string',
        '処理ステータス' => 'string',
    ];

    // 代入可能なフィールドを指定する
    protected $fillable = ['イベントid', 'イベント名', '処理ステータス'];

    // 代入不可なフィールドを指定する
    protected $guarded = ['created_at', 'updated_at'];
}
