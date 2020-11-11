<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\コントローラ\パスワードリセット;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use 認証\アプリ\ユースケース\パスワードリセット\リセット用メール送信;

class リセット用メール送信コントローラ extends Controller
{
    private $リセット用メール送信;

    public function __construct(リセット用メール送信 $リセット用メール送信)
    {
        $this->リセット用メール送信 = $リセット用メール送信;
    }

    public function __invoke(Request $リクエスト)
    {
        return $this->リセット用メール送信->実行($リクエスト);
    }
}
