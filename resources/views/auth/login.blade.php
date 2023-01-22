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
                    <h1 class ="card-title text-center">D  U  T  I  S  A</h1>
                </div>
                    <form method="post" action="/login">
                        @csrf
                        <div class="form-group">
                        <label for="exampleInputEmail1">TXXX</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="TXXX" name="txxx">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
  </body>
</html>
