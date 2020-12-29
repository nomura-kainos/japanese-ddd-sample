<?php

declare(strict_types=1);

namespace 商品カテゴリ\インフラ\エロクアント;

use Illuminate\Database\Eloquent\Model;
use 共通\エロクアント拡張\複合主キー設定;

/*
 * https://readouble.com/laravel/5.7/ja/eloquent-mutators.html
 */
class 小カテゴリエロクアント extends Model
{
    use 複合主キー設定;

    // テーブル名を指定する
    protected $table = '小カテゴリ';

    // 複合キーを指定する(複合キーを有効にするために、incrementを無効にする)
    protected $primaryKey = [ '大カテゴリid', '小カテゴリid' ];
    // INSERT時の自動採番の有無を指定する
    public $incrementing = false;

    // フィールドの属性キャストを指定(未指定の場合stringになる)
    protected $casts = [
        '大カテゴリid' => 'int',
        '小カテゴリid' => 'int',
        '名前' => 'string',
    ];

    // 代入可能なフィールドを指定する
    protected $fillable = ['大カテゴリid', '小カテゴリid', '名前'];

    // 代入不可なフィールドを指定する
    protected $guarded = ['created_at', 'updated_at'];
}
