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
                    <tr>
                        <td>{{ $単品->id }}</td>
                        <td>{{ $単品->名前 }}</td>
                        <td>{{ $単品->価格 }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
