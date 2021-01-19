<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use カート\インフラ\レスポンスデータ\カートIDレスポンスデータ;
use カート\インフラ\レスポンスデータ\カートレスポンスデータ;
use カート\インフラ\レスポンスデータ\カート内商品コレクションレスポンスデータ;
use 共通\仕様\選択;

interface カートリポジトリインターフェース
{
    public function 登録用に次のカートIDを取得する(): カートIDレスポンスデータ;

    public function 仕様で取得(選択 $仕様): ?カートレスポンスデータ;

    public function カート内商品を全件取得(カートID $カートid): カート内商品コレクションレスポンスデータ;

    public function 保存(カート $カート);

    public function カート内商品を削除(カートID $カートid, カート内商品ID $商品id);
}
