<?php

namespace App\Http\Controllers;

class ホームコントローラ extends Controller
{
    public function __invoke()
    {
        return view('ホーム');
    }
}
