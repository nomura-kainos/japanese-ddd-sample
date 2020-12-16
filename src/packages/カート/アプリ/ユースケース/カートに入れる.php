<?php

declare(strict_types=1);

namespace カート\アプリ\ユースケース;

use カート\ドメイン\モデル\カートID;
use カート\ドメイン\モデル\カートファクトリ;
use カート\ドメイン\モデル\カートリポジトリインターフェース;
use カート\ドメイン\モデル\カート内商品ID;
use カート\ドメイン\モデル\ユーザID;
use カート\ドメイン\モデル\空カート仕様;
use 共通\トランザクション\トランザクションインターフェース;
use 共通\ログインユーザ\ログインユーザインターフェース;

class カートに入れる
{
    private $トランザクション;
    private $カートリポ;
    private $カートファクトリ;
    private $ログインユーザ;
    private $空カート仕様;

    public function __construct(
        トランザクションインターフェース $トランザクション,
        カートリポジトリインターフェース $カートリポ,
        カートファクトリ $カートファクトリ,
        ログインユーザインターフェース $ログインユーザ,
        空カート仕様 $空カート仕様
    ) {
        $this->トランザクション = $トランザクション;
        $this->カートリポ = $カートリポ;
        $this->カートファクトリ = $カートファクトリ;
        $this->ログインユーザ = $ログインユーザ;
        $this->空カート仕様 = $空カート仕様;
    }

    public function 実行(int $商品id, int $数量)
    {
        $this->トランザクション->スコープ(function () use ($商品id, $数量) {
            $ユーザid = new ユーザID($this->ログインユーザ::id());
            $商品id = new カート内商品ID($商品id);
            $取得カート = $this->カートリポ->ユーザIDで1件取得($ユーザid);

            if ($this->空カート仕様->満たすか(new カートID($取得カート->id()))) {
                $this->新規カートに商品を追加する($ユーザid, $商品id, $数量);
                return;
            }

            $this->既存カートを更新する(new カートID($取得カート->id()), $ユーザid, $商品id, $数量);
        });
    }

    private function 新規カートに商品を追加する(ユーザID $ユーザid, カート内商品ID $商品id, int $数量)
    {
        $カート = $this->カートファクトリ->作成する($ユーザid);
        $this->カートリポ->保存($カート);

        $カート内商品 = $this->カートファクトリ->カート内商品を作成する(new カートID($カート->id()), $商品id, $数量);
        $this->カートリポ->カート内商品を保存($カート内商品);
    }

    private function 既存カートを更新する(カートID $カートid, ユーザID $ユーザid, カート内商品ID $商品id, int $数量)
    {
        $カート = $this->カートファクトリ->再構成する($カートid, $ユーザid);
        $this->カートリポ->保存($カート);

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
}
