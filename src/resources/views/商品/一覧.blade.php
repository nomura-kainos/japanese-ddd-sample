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
                    <div class="col-md-8 offset-md-4">
                        <a href="/user/login/google" class="btn btn-secondary" role="button">
                            Google Login
                        </a>
                    </div>
                    <div class="col-md-8 offset-md-4">
                        <a href="/user/login/facebook" class="btn btn-secondary" role="button">
                            Facebook Login
                        </a>
                    </div>
                    <div class="col-md-8 offset-md-4">
                        <a href="/user/login/amazon" class="btn btn-secondary" role="button">
                            Amazon Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
