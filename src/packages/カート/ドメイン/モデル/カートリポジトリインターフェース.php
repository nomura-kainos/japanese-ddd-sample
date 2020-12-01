<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use カート\インフラ\レスポンスデータ\カートIDレスポンスデータ;
use カート\インフラ\レスポンスデータ\カートレスポンスデータ;
use カート\インフラ\レスポンスデータ\カート内商品レスポンスデータ;

interface カートリポジトリインターフェース
{
    public function 登録用に次のカートIDを取得する(): カートIDレスポンスデータ;

    public function ユーザIDで1件取得(ユーザID $id): ?カートレスポンスデータ;

    public function 商品がすべて注文済みか(ユーザID $id): bool;

    public function カート内商品を1件取得(カートID $id, カート内商品ID $カート内商品id): ?カート内商品レスポンスデータ;

    public function 保存(カート $カート);

    public function カート内商品を保存(カート内商品 $カート内商品);

    public function カート内商品を削除(カートID $カートid, カート内商品ID $商品id);

    public function 注文済みにする(ユーザID $id);
}
