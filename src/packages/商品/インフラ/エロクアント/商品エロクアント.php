<?php

namespace 商品\インフラ\エロクアント;

use Illuminate\Database\Eloquent\Model;
use 商品\ドメイン\モデル\商品;

class 商品エロクアント extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = '商品';

    // 代入可能なフィールドを指定する
    protected $fillable = ['名前', '価格'];

    /**
     * @return 商品
     */
    public function ドメイン作成(): 商品
    {
        return new 商品(
            $this->id,
            $this->名前,
            $this->価格
        );
    }
}
