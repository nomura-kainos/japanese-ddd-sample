<?php

declare(strict_types=1);

namespace カート\プレゼンテーション\コントローラ;

use App\Http\Controllers\Controller;
use カート\アプリ\ユースケース\注文済みにする;
use 認証\ドメイン\モデル\ログインユーザ;

class 注文済みにするコントローラ extends Controller
{
    private $注文済みにする;

    public function __construct(注文済みにする $注文済みにする)
    {
        $this->注文済みにする = $注文済みにする;
    }

    public function __invoke()
    {
        $this->注文済みにする->実行(ログインユーザ::id());

        return redirect('/item');
    }
}
