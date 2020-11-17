@extends('layouts.app')

@section('content')
<table class="table table-border">
    <thead>
    <tr>
        <th></th>
        <th>名前</th>
        <th>数量</th>
        <th>総額</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($カート内複数商品->取得() as $商品)
            <tr>
                <td><a href="/cart/remove/{{ $商品->カートid() }}">x</a></td>
                <td>{{ $商品->名前() }}</td>
                <td>{{ $商品->数量() }}個</td>
                <td>{{ $商品->総額() }}円</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="payment-errors alert alert-danger"
     style="display: none;">
</div>
@endsection
