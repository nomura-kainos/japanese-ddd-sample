<?php

declare(strict_types=1);

namespace 特集\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use 特集\アプリ\ユースケース\詳細表示;

class 詳細コントローラ extends Controller
{
    public function __construct(private 詳細表示 $詳細表示)
    {
    }

    public function __invoke(int $id)
    {
        $特集 = $this->詳細表示->実行($id);

        return view('特集.詳細', [
            '特集' => $特集,
        ]);
    }
}
