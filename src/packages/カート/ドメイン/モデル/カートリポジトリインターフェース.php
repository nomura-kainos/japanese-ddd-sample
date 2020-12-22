<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use カート\インフラ\レスポンスデータ\カートIDレスポンスデータ;
use カート\インフラ\レスポンスデータ\カートレスポンスデータ;
use カート\インフラ\レスポンスデータ\カート内商品コレクションレスポンスデータ;
use カート\インフラ\レスポンスデータ\カート内商品レスポンスデータ;
use 共通\選別条件;
use 共通\選択;

interface カートリポジトリインターフェース
{
    public function 登録用に次のカートIDを取得する(): カートIDレスポンスデータ;

    public function 仕様で取得(選択 $仕様): ?カートレスポンスデータ;

    public function カート内商品を全件取得(カートID $カートid): カート内商品コレクションレスポンスデータ;

    public function カート内商品を1件取得(カートID $カートid, カート内商品ID $カート内商品id): ?カート内商品レスポンスデータ;

    public function 保存(カート $カート);

    public function カート内商品を保存(カート内商品 $カート内商品);

    public function カート内商品を削除(カートID $カートid, カート内商品ID $商品id);

    public function 注文済みにする(カートID $カートid);
}
