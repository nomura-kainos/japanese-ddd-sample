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
                    @foreach ($複数商品 as $商品)
                    <tr>
                        <td><a href="/item_detail/{{ $商品->id() }}"> {{ $商品->名前() }} </a></td>
                        <td>{{ $商品->レンタル料金() }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
