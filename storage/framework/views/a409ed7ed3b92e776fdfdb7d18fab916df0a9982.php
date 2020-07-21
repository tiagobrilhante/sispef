<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'SisPef')); ?></title>

    <?php echo $__env->make('layouts.insideApp.requiredStyles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->yieldContent('myStyles'); ?>



</head>
<body>
<div id="app">
    <?php echo $__env->make('insideApp.navBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col">

            <div class="alert alert-dark corteste my-0">
                <button type="button" id="sidebarCollapse" class="btn btn-dark btn-sm">
                    <i class="fa fa-align-justify"> </i>
                    <span> Recolher Menu</span>
                </button>

                alertas
            </div>

        </div>
    </div>

    <div class="wrapper">

        
        <?php echo $__env->make('insideApp.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <div id="content">

            <main>
                <?php echo $__env->yieldContent('content'); ?>
            </main>

        </div>

    </div>

</div>

<?php echo $__env->make('static.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.insideApp.requiredJs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('myScripts'); ?>

<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active__sidebar');
        });
    });
</script>

</body>
</html>
<?php /**PATH /Users/tiagobrilhante/Workspace/sispef/resources/views/layouts/insideApp/app.blade.php ENDPATH**/ ?>