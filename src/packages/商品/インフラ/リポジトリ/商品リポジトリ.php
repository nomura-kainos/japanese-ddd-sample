<?php

namespace 商品\インフラ\リポジトリ;

use Illuminate\Support\Collection;
use 商品\ドメイン\モデル\商品;
use 商品\インフラ\エロクアント\商品エロクアント;

class 商品リポジトリ implements \商品\ドメイン\モデル\商品リポジトリインターフェース
{
    private $商品エロクアント;

    public function __construct(商品エロクアント $商品エロクアント)
    {
        $this->商品エロクアント = $商品エロクアント;
    }

    /**
     * @param int $id
     * @return 商品
     */
    public function IDで1件取得(int $id):商品
    {
        $単品 = $this->商品エロクアント::find($id);
        return $単品->ドメイン作成();
    }

    /**
     * @return Collection
     */
    public function 全件取得(): Collection
    {
        $複数品 = $this->商品エロクアント::all();
        $複数品->map(function ($エロクアント) {
            return $エロクアント->ドメイン作成();
        });
        return $複数品;
    }

    /**
     * @return void
     */
    public function 保存(商品 $商品)
    {
        $単品 = $this->商品エロクアント::find($商品->id());

        $単品->fill(
            [
                '名前' => $商品->名前(),
                '価格' => $商品->価格(),
            ],
        );

        $単品->save();
    }
}
