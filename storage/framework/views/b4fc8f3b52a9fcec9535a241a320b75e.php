<?php $__env->startSection('title','Todos los restaurantes'); ?>

<?php $__env->startSection('content'); ?>

    <?php
        use Carbon\Carbon;
    ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/restaurantes.css')); ?>">
    <div class="contenido">
        
        <div class="filter-section text-white py-5" style="background: url('<?php echo e(asset('img/header.jpg')); ?>') no-repeat center center; background-size: cover;">
            <div class="container">
                <form action="<?php echo e(route('views.restaurantes')); ?>" method="GET" class="row g-3 align-items-center">
                    <!-- Menú desplegable (select) para elegir una etiqueta (tipo de restaurante) -->
                    <div class="col-md-4">
                        <label for="etiqueta" class="form-label">Tipo de Restaurante</label>
                        <select name="etiqueta" id="etiqueta" class="form-select" onchange="this.form.submit()">
                            <option value="Todos" <?php echo e(request('etiqueta') == 'Todos' ? 'selected' : ''); ?>>Todos</option>
                            <?php $__currentLoopData = $restaurantesPorEtiqueta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag => $contados): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tag); ?>" <?php echo e(request('etiqueta') == $tag ? 'selected' : ''); ?>><?php echo e($tag." ($contados)"); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- Campo de texto para buscar los restaurantes por su nombre -->
                    <div class="col-md-4">
                        <label for="busqueda" class="form-label">Buscar Restaurantes</label>
                        <input type="text" name="busqueda" id="busqueda" class="form-control" placeholder="Buscar restaurantes" value="<?php echo e(request('busqueda')); ?>">
                    </div>

                    <!-- Menú desplegable para ordenar -->
                    <div class="col-md-4">
                        <label for="orden" class="form-label">Ordenar por</label>
                        <select name="orden" id="orden" class="form-select" onchange="this.form.submit()">
                            <option value="" disabled selected>Ordenar por</option>
                            <option value="precio-mayor-menor" <?php echo e(request('orden') == 'precio-mayor-menor' ? 'selected' : ''); ?>>Precio de Mayor a Menor</option>
                            <option value="precio-menor-mayor" <?php echo e(request('orden') == 'precio-menor-mayor' ? 'selected' : ''); ?>>Precio de Menor a Mayor</option>
                            <option value="mejor-valorados" <?php echo e(request('orden') == 'mejor-valorados' ? 'selected' : ''); ?>>Mejor Valorados</option>
                            <option value="peor-valorados" <?php echo e(request('orden') == 'peor-valorados' ? 'selected' : ''); ?>>Peor Valorados</option>
                            <option value="antiguos" <?php echo e(request('orden') == 'antiguos' ? 'selected' : ''); ?>>Más Antiguos</option>
                            <option value="nuevos" <?php echo e(request('orden') == 'nuevos' ? 'selected' : ''); ?>>Más Nuevos</option>
                        </select>
                    </div>

                    <div class="col-12 text-center mt-3">
                        <button type="button" class="btn btn-secondary" onclick="window.location='<?php echo e(route('views.restaurantes')); ?>'">Borrar Filtros</button>
                    </div>
                </form>
            </div>
        </div>
        

        <div class="d-flex justify-content-center">

            <div class="grid-container lista-restaurantes row">
                <?php $__currentLoopData = $restaurantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="restaurante col-12 col-md-6 col-lg-4 mb-4">
                        <div class="imagenesRestaurante">
                            <?php if(file_exists(public_path('img/' . $restaurante->img_restaurant))): ?>
                                <img src="<?php echo e(asset('img/' . $restaurante->img_restaurant)); ?>" alt="<?php echo e($restaurante->nombre_restaurante); ?>">
                                <div style="position: relative;">
                                    <div class="valoracionDiv">
                                        <?php $__currentLoopData = $mediaEstrellas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php

                                                $valoracion = "No hay valoraciones";
                                            
                                                if ($media !== null) {
                                                    switch (true) {
                                                        case $media <= 2:
                                                            $valoracion = "$media · Mediocre";
                                                            break;
                                                        case $media <= 4:
                                                            $valoracion = "$media · Bueno";
                                                            break;
                                                        case $media <= 4.5:
                                                            $valoracion = "$media · Muy bueno";
                                                            break;
                                                        case $media <= 5:
                                                            $valoracion = "$media · Excelente";
                                                            break;
                                                    }
                                                }

                                            ?>

                                            <?php if($id == $restaurante->id): ?>

                                                <?php if(Carbon::parse($restaurante->created_at)->diffInDays(Carbon::now()) < 7): ?>
                                                    <span class="nuevo">Nuevo</span>
                                                <?php endif; ?>
                                        
                                                <span class="valoracion"><?php echo e($valoracion ?? "No hay valoraciones"); ?></span>

                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php else: ?>
                                <img src="<?php echo e(asset('img/predefinida.jpg')); ?>" alt="Imagen Predeterminada">
                                <div style="position: relative;">

                                    <div class="valoracionDiv">

                                        <?php $__currentLoopData = $mediaEstrellas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php

                                            $valoracion = "No hay valoraciones";
                                        
                                            if ($media !== null) {
                                                switch (true) {
                                                    case $media <= 2:
                                                        $valoracion = "$media · Mediocre";
                                                        break;
                                                    case $media <= 4:
                                                        $valoracion = "$media · Bueno";
                                                        break;
                                                    case $media <= 4.5:
                                                        $valoracion = "$media · Muy bueno";
                                                        break;
                                                    case $media <= 5:
                                                        $valoracion = "$media · Excelente";
                                                        break;
                                                }
                                            }

                                        ?>

                                            <?php if($id == $restaurante->id): ?>

                                                <?php if(Carbon::parse($restaurante->created_at)->diffInDays(Carbon::now()) < 7): ?>
                                                    <span class="nuevo">Nuevo</span>
                                                <?php endif; ?>

                                                <span class="valoracion"><?php echo e($valoracion ?? "No hay valoraciones"); ?></span>

                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="informacionRestaurante">
                            
                            <div class="cuboinfoRestaurante">
                                <a href="<?php echo e(route('vistas.restaurante', $restaurante->id)); ?>">
                                    <h3><?php echo e($restaurante->name); ?></h3>
                                </a>
                                <p class="propiedadesRestaurante">
                                    <?php echo e($restaurante->tags->pluck('name')->implode(', ')); ?>

                                </p>
                                <p class="propiedadesRestaurante">
                                    <?php echo e($zonaRestaurante[$restaurante->id] ?? "No hay zona asignada"); ?>

                                </p>
                                <p class="propiedadesRestaurante">
                                    <?php echo e(number_format($restaurante->average_price)); ?> €
                                </p>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.plantilla_restaurante', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\bcnrestaurantes\resources\views/restaurantes/todos.blade.php ENDPATH**/ ?>