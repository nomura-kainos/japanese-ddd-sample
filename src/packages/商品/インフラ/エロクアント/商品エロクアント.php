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

    // 代入可能なフィールドを指定する
    protected $fillable = ['名前', 'レンタル料金'];

    // 代入不可なフィールドを指定する
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
