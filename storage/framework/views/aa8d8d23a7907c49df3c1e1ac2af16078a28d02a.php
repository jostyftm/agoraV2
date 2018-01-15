<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo $__env->yieldContent('title'); ?></title>

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <?php echo $__env->yieldContent('css'); ?>

        <!-- Scripts -->
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootstrap.js')); ?>"></script>
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>
        <div id="wrapper">
            <!-- Sidebar -->
            <?php echo $__env->make('institution.dashboard.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <!-- SubHeader -->
                <!-- NAV -->
                <?php echo $__env->make('institution.dashboard.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- END NAV -->
                
                <!-- <?php echo $__env->make('institution.dashboard.subheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
                <!-- /#subHeader-wrapper -->
                <div class="container-fluid xyz" id="content">
                    <?php echo $__env->yieldContent('breadcrums'); ?>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>

            <?php echo $__env->make('institution.dashboard.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    
            </div>
            
        </div>

        <!-- Scripts -->
        
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
        <?php echo $__env->yieldContent('js'); ?>

    </body>
</html>