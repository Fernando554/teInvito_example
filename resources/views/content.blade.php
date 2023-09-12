<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    @extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">{{ $data['title'] }}</h2>
        </div>
        
        @foreach ($data['columns'] as $column)
        <div class="col-md-4">
            <div class="card text-center">
                <img src="{{ asset('storage/' . $column['image']) }}" class="card-img-top img-fluid" alt="{{ $column['imageAlt'] }}" style="width: 200px; height: 200px;">
                <div class="card-body">
                    <p>{{ $column['text'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>