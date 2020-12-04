<head>
    <!-- include libraries(jQuery, bootstrap) -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>

    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js'></script>
</head>

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
                    本文：<textarea id='summernote' name='本文'></textarea>
                    <div><input type='submit' value='登録'></div>
                </form>

            </div>
        </div>
    </div>
</div>
</body>

<!-- summernote css/js -->
<link href='https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css' rel='stylesheet'>
<script src='https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js'></script>
<script type='text/javascript'>
    $('#summernote').summernote({
        height: 900,
        width: 800,
    });
</script>
