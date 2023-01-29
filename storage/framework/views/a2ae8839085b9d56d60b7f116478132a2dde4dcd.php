<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>

<body style="height: 100vh;" class="container-fluid d-flex flex-column gap-3 justify-content-center align-items-center">
    <h3 class="title">DuTiSa</h3>
    <form>
        <div class="mb-3">
            <label for="trainee-number" class="form-label">Trainee Number</label>
            <input type="text" class="form-control" id="trainee-number">
        </div>
        <div class="mb-3">
            <label for="trainee-password" class="form-label">Password</label>
            <input type="password" class="form-control" id="trainee-password">
        </div>
        <button type="submit" style="width: 100%;" class="btn btn-primary">Login</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>

</body>

</html>
<?php /**PATH C:\Users\jerem\OneDrive\Desktop\DuTiSa-LaravelCloudStorage-main\resources\views//auth/login.blade.php ENDPATH**/ ?>