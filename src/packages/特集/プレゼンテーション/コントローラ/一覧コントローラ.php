<?php

declare(strict_types=1);

namespace 特集\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use 特集\アプリ\ユースケース\一覧表示;

class 一覧コントローラ extends Controller
{
    private $一覧表示;

    public function __construct(一覧表示 $一覧表示)
    {
        $this->一覧表示 = $一覧表示;
    }

    public function __invoke()
    {
        $複数特集 = $this->一覧表示->実行();

        return view('特集.一覧', ['複数特集' => $複数特集]);
    }
}
