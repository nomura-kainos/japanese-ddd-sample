@extends('layouts.app')

@section('content')
<div class="table table-border">
    <thead>
    <tr>
        <th></th>
        <th></th>
        <th>名前</th>
        <th>数量</th>
        <th>総額</th>
    </tr>
    </thead>
    @foreach ($カート内複数商品->取得() as $商品)
        <form action="{{ url('/cart/remove')}}" method="POST">
            {{ csrf_field() }}

            <tr>
                <td><input type="submit" value="x"></td>
                <td>{{ $商品->名前() }}</td>
                <td>{{ $商品->数量() }}個</td>
                <td>{{ $商品->総額() }}円</td>
                <input type="hidden" name="カートid" value="{{ $商品->カートid() }}">
                <input type="hidden" name="商品id" value="{{ $商品->商品id() }}">
            </tr>
        </form>
    @endforeach

    <form action="{{ url('/order')}}" method="POST">
        {{ csrf_field() }}

        @foreach ($カート内複数商品->取得() as $商品)
            <input type="hidden" name="商品[{{ $loop->index }}][カートid]" value="{{ $商品->カートid() }}">
            <input type="hidden" name="商品[{{ $loop->index }}][商品id]" value="{{ $商品->商品id() }}">
            <input type="hidden" name="商品[{{ $loop->index }}][名前]" value="{{ $商品->名前() }}">
            <input type="hidden" name="商品[{{ $loop->index }}][数量]" value="{{ $商品->数量() }}">
            <input type="hidden" name="商品[{{ $loop->index }}][総額]" value="{{ $商品->総額() }}">
        @endforeach

        <div><input type='submit' value='注文を確定する'></div>
    </form>

</div>
<div class="payment-errors alert alert-danger"
     style="display: none;">
</div>
@endsection
