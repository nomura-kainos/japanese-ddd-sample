@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <form action="{{ url('/item/register')}}" method="POST">
                    {{ csrf_field() }}

                    名前：<input type='text' name='名前'><br>
                    レンタル料金：<input type='text' name='レンタル料金'><br>
                    カテゴリid：<input type='text' name='カテゴリid'><br>
                    <div><input type='submit' value='登録'></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
