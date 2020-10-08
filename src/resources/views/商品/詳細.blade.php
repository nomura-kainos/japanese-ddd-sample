@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <form action="{{ url('/item/edit/'.$商品->id() )}}" method="POST">
                    {{ csrf_field() }}
                    <input type='hidden' name='id' value='{{ $商品->id() }}'><br>

                    ID:{{ $商品->id() }}<br>
                    名前：<input type='text' name='名前' value='{{ $商品->名前() }}'><br>
                    レンタル料金：<input type='text' name='レンタル料金' value='{{ $商品->レンタル料金() }}'><br>
                    カテゴリID：<input type='text' name='カテゴリid' value='{{ $商品->カテゴリid() }}'><br>
                    <div><input type='submit' value='編集'></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
