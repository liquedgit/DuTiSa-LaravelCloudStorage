<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DuTiSa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
</head>
<body>
<div class="global">
    <div>
        <div class="card-body">
            <h1 class="card-title text-center mb-3">D U T I S A</h1>
        </div>


        @error('status')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
        </div>
        @enderror
        <form method="POST" action="/registerpage">
            @csrf

            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('Name') is-invalid @enderror" id="name"
                       placeholder="XXXXXXX" name="name" required autofocus>

            </div>

            <div class="form-group mb-3">
                <label for="TraineeCode">Trainee Number</label>
                <input type="text" class="form-control @error('TraineeCode') is-invalid @enderror" id="TraineeCode"
                       placeholder="TXXX" name="TraineeCode" required autofocus>

                @error('TraineeCode')
                <div class="invalid-feedback">
                    <p>Wrong TXXX Format</p>
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                       placeholder="Password" name="password" required>

                @error('password')
                <div class="invalid-feedback">
                    <p>Wrong password Format</p>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="ConfirmPassword">Confirm Password</label>
                <input type="password" class="form-control @error('confpassword') is-invalid @enderror" id="ConfirmPassword"
                       placeholder="Password" name="ConfirmPassword" required>

            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary m-3">Submit</button>
            </div>

            <div class="text-center">
                Already have an account? <a href="{{url('/logindirect')}}">Login</a> here!
            </div>

        </form>
    </div>
</div>
</body>

</html>
