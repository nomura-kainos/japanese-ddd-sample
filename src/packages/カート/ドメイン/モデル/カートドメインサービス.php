<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use 認証\ドメイン\モデル\ログインユーザ;

class カートドメインサービス
{
    private $カートリポ;
    private $カートファクトリ;

    public function __construct(
        カートリポジトリインターフェース $カートリポ,
        カートファクトリ $カートファクトリ
    ) {
        $this->カートリポ = $カートリポ;
        $this->カートファクトリ = $カートファクトリ;
    }

    public function カートに入れる($商品id, $数量)
    {
        $ユーザid = new ユーザID(ログインユーザ::id());
        $カート = $this->カートリポ->ユーザIDで1件取得($ユーザid);

        if ($カート === null) {
            $カート = $this->カートファクトリ->作成する($ユーザid);
        } else {
            $カート = $this->カートファクトリ->再構成する(new カートID($カート->id()), $ユーザid);
        }
        $this->カートリポ->保存($カート);

        $カートid = new カートID($カート->id());
        $商品id = new カート内商品ID($商品id);

        $カート内商品 = $this->カートリポ->カート内商品を1件取得($カートid, $商品id);
        if ($カート内商品 === null) {
            $カート内商品 = $this->カートファクトリ->カート内商品を作成する($カートid, $商品id, $数量);
        } else {
            $カート内商品 = $this->カートファクトリ->カート内商品を再構成する(
                $カートid,
                $商品id,
                $数量,
                $カート内商品->注文済みか()
            );
        }
        $this->カートリポ->カート内商品を保存($カート内商品);
    }

    public function カート内商品を削除($カートid, $商品id)
    {
        $this->カートリポ->カート内商品を削除(new カートID($カートid), new カート内商品ID($商品id));
    }
}
