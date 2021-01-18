<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use 共通\エンティティ;
use 共通\配列コピー\ディープコピー;
use 共通\集約ルート;

class カート extends エンティティ implements 集約ルート
{
    public function __construct(
        private カートID $id,
        private ユーザID $ユーザid,
        private array $商品コレクション = []
    ) {
        parent::ユニークキーを設定する($id);
    }

    public function id(): int
    {
        return $this->id->値;
    }

    public function ユーザid(): int
    {
        return $this->ユーザid->値;
    }

    public function 商品コレクション(): array
    {
        return ディープコピー::実行($this->商品コレクション);
    }

    public function 商品を全て注文済みにする()
    {
        $注文済み商品コレクション = array_map(function (カート内商品 $商品) {
            $商品->注文済みにする();
            return $商品;
        }, $this->商品コレクション);

        $this->商品コレクション = $注文済み商品コレクション;
    }

    public function 商品を追加する(カート内商品ID $商品id, int $数量)
    {
        $this->商品コレクション[] = new カート内商品($this->id, $商品id, $数量);
    }
}
