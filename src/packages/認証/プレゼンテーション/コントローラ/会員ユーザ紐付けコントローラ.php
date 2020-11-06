<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use 認証\アプリ\ユースケース\会員ユーザ紐付け;

class 会員ユーザ紐付けコントローラ extends Controller
{
    private $会員ユーザ紐付け;

    public function __construct(会員ユーザ紐付け $会員ユーザ紐付け)
    {
        $this->会員ユーザ紐付け = $会員ユーザ紐付け;
    }

    public function __invoke($SNS名)
    {
        $this->会員ユーザ紐付け->実行($SNS名);

        return redirect('http://localhost:10080/item');
    }
}
