<?php

declare(strict_types=1);

namespace カート\インフラ\エロクアント;

use Illuminate\Database\Eloquent\Model;
use 共通\エロクアント拡張\複合主キー設定;

/*
 * https://readouble.com/laravel/5.7/ja/eloquent-mutators.html
 */
class カート内商品エロクアント extends Model
{
    use 複合主キー設定;

    // テーブル名を指定する
    protected $table = 'カート内商品';

    // 複合キーを指定する(複合キーを有効にするために、incrementを無効にする)
    protected $primaryKey = [ 'カートid', '商品id' ];
    // INSERT時の自動採番の有無を指定する
    public $incrementing = false;

    // フィールドの属性キャストを指定(未指定の場合stringになる)
    protected $casts = [
        'カートid' => 'int',
        '商品id' => 'int',
        '数量' => 'int',
        '注文済みか？' => 'boolean',
    ];

    // 代入可能なフィールドを指定する
    protected $fillable = ['カートid', '商品id', '数量', '注文済みか？'];

    // 代入不可なフィールドを指定する
    protected $guarded = ['created_at', 'updated_at'];
}
