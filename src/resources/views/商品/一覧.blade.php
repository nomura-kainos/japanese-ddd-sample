@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    You are logged in!
                </div>
                <p>A list of items.</p>
                <table>
                    @foreach ($複数商品->取得() as $商品)
                    <tr>
                        <td><a href="/item_detail/{{ $商品->id() }}"> {{ $商品->名前() }} </a></td>
                        <td>{{ $商品->レンタル料金() }}</td>
                        <td>{{ $商品->カテゴリ名() }}</td>
                    </tr>
                    @endforeach
                </table>
                <br>
                <a href="/item/register/"> 登録 </a>
                <div class="form-group row mt-2">
                    <div class="col-md-8 offset-md-4" role="button">
                        <a href="/user/login/google" role="button">
                            <img border="0" alt="Login with Google"
                                 src="{{ asset('/img/googleログインボタン.png') }}"
                                 width="160" height="40" />
                        </a>
                    </div>
                    <div class="col-md-8 offset-md-4">
                        <a href="/user/login/facebook" role="button">
                            <img border="0" alt="Login with Google"
                                 src="{{ asset('/img/facebookログインボタン.png') }}"
                                 width="156" height="35" />
                        </a>
                    </div>
                    <div class="col-md-8 offset-md-4">
                        <a href="/user/login/amazon" role="button">
                            <img border="0" alt="Login with Amazon"
                                 src="https://images-na.ssl-images-amazon.com/images/G/01/lwa/btnLWA_gold_156x32.png"
                                 width="156" height="32" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
