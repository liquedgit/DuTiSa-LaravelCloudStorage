<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('/css/homepage.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/homepage.js') }}"></script>
    <title>Dashboard</title>
</head>
<body>

<div class="card-body">
    <h1 class="card-title text-center" id="title" style="font-family: Verdana;">D U T I S A</h1>
</div>

<h5 class="card-title mx-5" style="font-family: 'Lucida Sans'; text-align: right;">Hello, {{get_current_user()}}</h5>


<div class="d-flex flex-row m-4" id="navbar">
    @auth
        <form method="get" action="{{url('/settings')}}">
            <button type="submit" class="btn" id="settings">Change Password</button>
        </form>

        <form method="get" action="/logout">
            <button type="submit" class="btn btn-danger" id="logout" style="font-family: 'Lucida Sans'">Log Out</button>
        </form>
    @else
        <form method="get" action="/">
            <button type="submit" class="btn" id="login">Log In</button>
        </form>
    @endauth
</div>



<table class="table caption-top" id="table">
    {{-- <caption>List of users</caption> --}}
    <thead>
    <tr>
        <th scope="col" style="font-family: 'Lucida Sans'">| File Name</th>
        <th scope="col" style="font-family: 'Lucida Sans'">| Download</th>
        <th scope="col" style="font-family: 'Lucida Sans'">| Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($files as $file)
        <tr>
            <td style="width: 1000px">{{$file->name}}</td>
            {{--                <td>{{$file->}}</td>--}}
            <td>
                <form action="/download/{{$file->id}}" method="post" id="downloadform{{$file->id}}">
                    @csrf
                    {{-- <button type="submit"> --}}
                    <a href="javascript:$('#downloadform{{$file->id}}').submit();" type="submit"><img
                            src="{{asset('/assets/download.png')}}" alt="" class="icon" id="download"></a>
                    {{-- <a href="#" type="submit"><img src="{{asset('/assets/download.png')}}" alt="" class="icon" id="download"></a> --}}
                    {{-- </button> --}}
                </form>
            </td>
            <td>
                <form action="/delete/{{$file->id}}" method="post" id="delform{{$file->id}}">
                    @csrf
                    <a href="javascript:$('#delform{{$file->id}}').submit();" type="submit"><img
                            src="{{asset('/assets/delete.png')}}" alt="" class="icon" id="delete"></a>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $files->links() }}
<div class="main">
    <hr class=" border">
    <div class="d-flex justify-content-around">
        <form action="/upload" method="post" enctype="multipart/form-data" id="file-form">
            @csrf
            <div id="box">
                <label for="formFile" id="choosefilelbl" style="font-family: 'Lucida Sans'">
                    Choose File
                </label>
                <input class="form-control" type="file" id="formFile" hidden name="file[]" multiple>
            </div>
            <button type="submit" id="btn" value="Upload" class="mt-5" style="font-family: 'Lucida Sans'">UPLOAD
            </button>
        </form>
    </div>
</div>
</body>
</html>
