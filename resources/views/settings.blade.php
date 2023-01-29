<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="container">
    <nav class="navbar navbar-expand-lg my-3">
        <div class="container-fluid d-flex">
            <a class="navbar-brand fs-3" href="#">DuTiSa Cloud Drive</a>
            <ul class="navbar-nav">
                <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="{{ url('dashboard') }}">
                        <button class="btn btn-primary">Dashboard</button>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="{{ url('/logout') }}">
                        <button class="btn btn-primary">Logout</button>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="container bg-info my-3 fs-5 px-4 py-2 text-light">
            {{ 'Hello ' . Auth::user()->TraineeCode . ', ' . Auth::user()->name }}
        </div>
        <div class="container">
            <div class="m-2">Change Password</div>
            <hr class="border border-primary border-1 opacity-75">
            <form method="post" action="{{ url('settings') }}" class="my-3">
                @csrf
                @method('put')
                <div class="w-50 mb-3">
                    <label for="new-password" class="form-label">New Password</label>
                    <input type="password" class="form-control border border-dark border-1" name="new_password"
                        placeholder="New Password">
                </div>
                <div class="w-50 mb-3">
                    <label for="confirm-new-password" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control border border-dark border-1" name="confirm_new_password"
                        placeholder="Password">
                </div>
                <button type="submit" style="width: 100%;" class="w-50 btn btn-primary">Change Password</button>
            </form>
        </div>

        @if ($errors->any())
            <div class="container">
                <div class="alert alert-primary w-50" role="alert">
                    {{ $errors->first() }}
                </div>
            </div>
        @endif

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
            integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
        </script>
</body>

</html>
