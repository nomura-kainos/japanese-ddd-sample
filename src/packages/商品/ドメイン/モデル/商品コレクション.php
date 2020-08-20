<?php
declare(strict_types=1);

namespace 商品\ドメイン\モデル;

use Illuminate\Support\Collection;

/*
 * 商品ドメインオブジェクトのファーストクラスコレクション
 *
 * Collection型の場合、LaravelのCollectionに影響するため、今後別フレームワークに移し替えやすいように
 * 独自のクラスを作成する
 */
class 商品コレクション
{
    private $商品コレクション;

    public function __construct(Collection $コレクション)
    {
        $ドメイン作成後のコレクション = $コレクション->map(function ($エロクアント) {
            return $エロクアント->ドメイン作成();
        });
        $this->商品コレクション = $ドメイン作成後のコレクション;
    }

    public function 取得()
    {
        return $this->商品コレクション;
    }
}
