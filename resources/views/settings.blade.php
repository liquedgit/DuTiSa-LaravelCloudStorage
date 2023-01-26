<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DuTiSa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
</head>
<body>
<div class="global">
    <div>
        <div class="card-body">
            <h1 class ="card-title text-center">{{'Update ' . auth()->user()->TraineeCode . ' Password'}}</h1>
        </div>
        <form method="POST" action="{{url('/settings')}}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="TraineeCode">New Password</label>
                <input type="password" class="form-control" id="new-password" placeholder="New Password" name="new_password" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Confirm New Password</label>
                <input type="password" class="form-control @error('confirm-new-password') is-invalid @enderror" id="confirm-new-password" placeholder="Confirm New Password" name="confirm_new_password" required>
                @error('confirm-new-password')
                <div class="invalid-feedback">
                    <p>Confirm password is not the same!</p>
                </div>
                @enderror
            </div>
            <a href="{{url('/dashboard')}}"><button type="button" class="btn btn-primary">Back</button></a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</body>
</html>
