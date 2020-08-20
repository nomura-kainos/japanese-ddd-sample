<?php
declare(strict_types=1);

namespace 商品\インフラ\エロクアント;

use Illuminate\Database\Eloquent\Model;
use 商品\ドメイン\モデル\レンタル料金;
use 商品\ドメイン\モデル\商品;
use 商品\ドメイン\モデル\商品ID;

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

    /**
     * @return 商品
     */
    public function ドメイン作成(): 商品
    {
        return new 商品(
            商品ID::作成($this->id),
            $this->名前,
            レンタル料金::作成($this->レンタル料金)
        );
    }
}
