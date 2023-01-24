<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('/css/homepage.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/homepage.js') }}"></script>
    <title>Dashboard</title>
</head>
<body>

    <div class="d-flex flex-row">
        <h1 class="dt">DuTiSa</h1>
        <form method="POST" action="/logout">
            @csrf
            <input class="logbtn" type="submit" value="Logout">
        </form>
    </div>

    <div class="uploadbox">
        {{-- Buat Uploadnya --}}
    </div>
    <div class="container">
        <div id="viewbox">
            <h1 class="text-light" >{{ auth()->user()->TraineeCode }} Files</h1>
            <hr class="border">

            <button class="backbtn"> Back</button>
        </div>
    </div>
    <div class="card-body">
        <h1 class ="card-title text-center" id="title">D  U  T  I  S  A</h1>
    </div>
    <div class="main">
        <hr class=" border">
        <div class="d-flex justify-content-around">
            <div id="box"><button type="button" class="btn btn-primary btn-lg border"><img class="uploadimg" src="{{ asset('assets/upload.png') }}"></button></div>
            <div id="box"><button type="button" id="viewbut" class="btn btn-primary btn-lg border"><img class="viewimg" src="{{ asset('/assets/view.png') }}"></button></div>
        </div>
    </div>
</body>
</html>
