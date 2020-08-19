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
                    タイトル：<input type='text' name='名前' value='{{ $商品->名前() }}'><br>
                    内容：<input type='text' name='価格' value='{{ $商品->価格() }}'><br>
                    <div><input type='submit' value='編集'></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
