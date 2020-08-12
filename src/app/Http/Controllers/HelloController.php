<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use App\MyClasses\MyService;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    private $fname;

    function __construct()
    {
        $this->fname = 'hello.txt';
    }

    public function index(MyService $myservice, int $id = -1)
    {
        $myservice->setId($id);
        $data = [
            'msg' => $myservice->say($id),
            'data' => $myservice->alldata(),
        ];
        return view('hello.index', $data);
    }

    public function other(Request $request)
    {
        Storage::disk('local')->putFile('files', $request->file('file'));
        return redirect()->route('hello');
    }

    public function getAuth(Request $request)
    {
        $param = ['message' => 'ログインして下さい'];
        return view('hello.auth', $param);
    }

    public function postAuth(Request $request)
    {
        $email = $request->email;
        $password = $request->pqssword;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $msg = 'ログインしました('.Auth::user()->name.')';
        } else {
            $msg = 'ログインに失敗しました';
        }
        return view('hello.auth', ['message' => $msg]);
    }

    public function post(HelloRequest $request)
    {
        return view('hello.index', ['msg' => '正しく入力されました',]);
    }

    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get('msg');
        return view('hello.session', ['session_data' => $sesdata]);
    }

    public function ses_put(Request $request)
    {
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return redirect('hello/session');
    }
}
