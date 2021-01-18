<?php

declare(strict_types=1);

namespace 認証\インフラ\レスポンスデータ;

use Illuminate\Support\Collection;
use 認証\インフラ\エロクアント\SNSアカウントエロクアント;

class SNSアカウントコレクションレスポンスデータ
{
    private $SNSアカウントコレクション;

    public function __construct(Collection $コレクション)
    {
        $SNSアカウントコレクション = $コレクション->map(function (SNSアカウントエロクアント $SNSアカウント) {
            return new SNSアカウント($SNSアカウント);
        });

        $this->SNSアカウントコレクション = $SNSアカウントコレクション;
    }

    public function 取得(): array
    {
        return $this->SNSアカウントコレクション->toArray();
    }
}

/*
 * phpでインナークラスが使えないため、privateにできない
 * このビューモデル以外で使わないこと
 */
class SNSアカウント
{
    private string $SNS名;
    private string $id;

    public function __construct(SNSアカウントエロクアント $SNSアカウント)
    {
        $this->SNS名 = $SNSアカウント->SNS名;
        $this->id = $SNSアカウント->SNSアカウントid;
    }

    public function SNS名(): string
    {
        return $this->SNS名;
    }

    public function id(): string
    {
        return $this->id;
    }
}
