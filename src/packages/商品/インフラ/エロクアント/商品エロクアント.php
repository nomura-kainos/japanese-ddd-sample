<?php
declare(strict_types=1);

namespace 商品\インフラ\エロクアント;

use Illuminate\Database\Eloquent\Model;

class 商品エロクアント extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = '商品';

    // INSERT時の自動採番の有無を指定する
    public $incrementing = false;

    // 代入可能なフィールドを指定する
    protected $fillable = ['id', '名前', 'レンタル料金'];

    // 代入不可なフィールドを指定する
    protected $guarded = ['created_at', 'updated_at'];
}
