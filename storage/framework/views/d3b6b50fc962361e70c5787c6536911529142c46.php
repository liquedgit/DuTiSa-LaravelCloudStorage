<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name')); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>

<body>
<div class="login-form card position-absolute top-50 start-50 translate-middle">
    <h3 class="title">DuTiSa Cloud Drive</h3>
    <form method="post" action="<?php echo e(url('login')); ?>" class="my-3">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="trainee-code" class="form-label">Trainee Code</label>
            <input type="text" class="form-control border border-dark border-1" name="TraineeCode"
                   placeholder="TXXX">
        </div>
        <div class="mb-3">
            <label for="trainee-password" class="form-label">Password</label>
            <input type="password" class="form-control border border-dark border-1" name="password"
                   placeholder="Password">
        </div>
        <button type="submit" style="width: 100%;" class="btn btn-primary">Login</button>
    </form>
    <div class="mb-3">
        Dont have an account? <a href="<?php echo e(url('/registerdirect')); ?>">Register</a>
    </div>
    <?php if($errors->any()): ?>
        <div class="alert alert-primary" role="alert">
            <?php echo e($errors->first()); ?>

        </div>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
</script>
</body>

</html>
<?php /**PATH D:\Work\Github\DuTiSa-LaravelCloudStorage\resources\views/auth/login.blade.php ENDPATH**/ ?>