<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\コントローラ\パスワードリセット;

use App\Http\Controllers\Controller;
use 認証\アプリ\ユースケース\パスワードリセット\リンク表示;

class リンク表示コントローラ extends Controller
{
    private $リンク表示;

    public function __construct(リンク表示 $リンク表示)
    {
        $this->リンク表示 = $リンク表示;
    }

    public function __invoke()
    {
        return $this->リンク表示->実行();
    }
}
