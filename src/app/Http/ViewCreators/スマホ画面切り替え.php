<?php

namespace App\Http\ViewCreators;

use Illuminate\View\View;
use Illuminate\Support\Facades\View as V;
use Illuminate\View\ViewName;
use Jenssegers\Agent\Facades\Agent;

/*
 * 参考 https://qiita.com/reflet/items/111058c7b13350ed5e10
 */
class スマホ画面切り替え
{
    private View $ビュー;

    private $切り替え対象外のフォルダ = ['layouts'];

    private $ビュー名の接尾語 = '_スマホ';

    /**
     * スマホ画面に切り替える
     */
    public function create(View $ビュー)
    {
        $this->ビュー = $ビュー;

        // タブレットはPC画面と同じ扱いにする
        if ($this->PCか？() || $this->タブレットか？()) {
            return;
        }

        $ビュー名 = $this->ビュー名を取得();
        if ($this->切り替え対象外か？($ビュー名)) {
            return;
        }

        $this->ビューのパスを変更する($ビュー名 . $this->ビュー名の接尾語);
    }

    private function PCか？(): bool
    {
        return Agent::isDesktop();
    }

    private function タブレットか？(): bool
    {
        return Agent::isTablet();
    }

    private function ビュー名を取得(): string
    {
        /**
         *  例:
         *  view('カート.一覧')
         *  view('layouts.app')
         */
        return $this->ビュー->getName();
    }

    private function 切り替え対象外か？(string $ビュー名): bool
    {
         list($フォルダ名) = explode('.', $ビュー名);
        if(in_array($フォルダ名, $this->切り替え対象外のフォルダ)){
           return true;
        };

        return false;
    }

    private function ビューのパスを変更する(string $スマホのビュー名)
    {
        $ファインダー = v::getFinder();
        $this->ビュー->setPath(
            $ファインダー->find(
                ViewName::normalize($スマホのビュー名)
            )
        );
    }
}