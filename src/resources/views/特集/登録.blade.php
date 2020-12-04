@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

<body>
<div class='container'>
    <div class='row'>
        <div class='col-md-7 offset-3 mt-4'>
            <div class='card-body'>

                <form action='{{ url('/report')}}' method='POST'>
                    {{ csrf_field() }}

                    @if ($errors->any())
                        <div class='alert alert-danger'>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    タイトル：<input type='text' name='タイトル'><br>
                    本文：<input type='text' name='本文'><br>
                    <div><input type='submit' value='登録'></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
