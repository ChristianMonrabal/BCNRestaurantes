<?php echo $__env->yieldContent('content'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
</head>
<body>
    <!-- Loader (Pantalla de carga) -->
    <div id="loader">
        <div class="spinner-border text-warning" role="status">
        </div>
    </div>
    
    
    <div id="main">

        
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?php echo e(asset('img/bcn-logo.png')); ?>" alt="" class="img-fluid">
                </a>
        
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item me-4"> <!-- Agregar margen al final -->
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'admin.users' ? 'text-custom-orange' : 'active'); ?> fs-5" aria-current="page" href="<?php echo e(route('admin.users')); ?>">Usuarios</a>
                        </li>
                        <li class="nav-item me-4"> <!-- Agregar margen al final -->
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'admin.restaurants' ? 'text-custom-orange' : 'active'); ?> fs-5" href="<?php echo e(route('admin.restaurants')); ?>">Restaurantes</a>
                        </li>
                        <li class="nav-item me-4"> <!-- Agregar margen al final -->
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'admin.home' ? 'text-custom-orange' : 'active'); ?> fs-5" href="<?php echo e(route('home')); ?>">Página pública</a>
                        </li>
                    </ul>                    

                    <div class="text-end"> 
                        <button class="btn btn-custom-orange">Cerrar Sesión</button>
                    </div>
                </div>
    

            </div>
        </nav>

        
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <h1><?php echo $__env->yieldContent('title'); ?></h1>
            </div>

            
            <div id="table-content">
                
            </div>
        </div>

        
        <?php echo $__env->yieldContent('modal'); ?>

        
        <?php echo $__env->yieldPushContent('scripts'); ?>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="<?php echo e(asset('js/admin/alert.js')); ?>"></script>
    </div>
</body>
</html><?php /**PATH C:\wamp64\www\bcnrestaurantes\resources\views/admin/layout/crud.blade.php ENDPATH**/ ?>