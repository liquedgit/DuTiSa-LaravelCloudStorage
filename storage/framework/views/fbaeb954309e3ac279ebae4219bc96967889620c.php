<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?php echo e(asset('/css/homepage.css')); ?>" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('/js/homepage.js')); ?>"></script>
    <title>Dashboard</title>
</head>
<body>

<div class="card-body">
    <h1 class="card-title text-center" id="title" style="font-family: Verdana;">D U T I S A</h1>
</div>


<div class="d-flex flex-row" id="navbar">
    <?php if(auth()->guard()->check()): ?>
        <form method="get" action="/logout">
            <button type="submit" class="btn" id="logout">Log Out</button>
        </form>
    <?php else: ?>
        <form method="get" action="/">
            <button type="submit" class="btn" id="login">Log In</button>
        </form>
    <?php endif; ?>
</div>


<h2 class="card-title text-center">Hello, <?php echo e(get_current_user()); ?></h2>


<table class="table caption-top" id="table">
    
    <thead>
    <tr>
        <th scope="col">File Name</th>
        <th scope="col">Download</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="width: 1000px"><?php echo e($file->name); ?></td>
            
            <td>
                <form action="/download/<?php echo e($file->id); ?>" method="post" id="downloadform<?php echo e($file->id); ?>">
                    <?php echo csrf_field(); ?>
                    
                    <a href="javascript:$('#downloadform<?php echo e($file->id); ?>').submit();" type="submit"><img
                            src="<?php echo e(asset('/assets/download.png')); ?>" alt="" class="icon" id="download"></a>
                    
                    
                </form>
            </td>
            <td>
                <form action="/delete/<?php echo e($file->id); ?>" method="post" id="delform<?php echo e($file->id); ?>">
                    <?php echo csrf_field(); ?>
                    <a href="javascript:$('#delform<?php echo e($file->id); ?>').submit();" type="submit"><img
                            src="<?php echo e(asset('/assets/delete.png')); ?>" alt="" class="icon" id="delete"></a>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php echo e($files->links()); ?>

<div class="main">
    <hr class=" border">
    <div class="d-flex justify-content-around">
        <form action="/upload" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div id="box">
                <label for="formFile" id="choosefilelbl">
                    Choose File
                </label>
                <input class="form-control" type="file" id="formFile" hidden name="file[]" multiple>
            </div>
            <button type="submit" id="btn" value="Upload">UPLOAD
            </button>
        </form>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\Users\jerem\OneDrive\Desktop\DuTiSa-LaravelCloudStorage-main\resources\views/homepage.blade.php ENDPATH**/ ?>