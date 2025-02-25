<!-- resources/views/profile/partials/favorites.blade.php -->
<div>
    <h4>Mis favoritos</h4>
    <?php if(isset($favorites) && $favorites->isEmpty()): ?>
        <p>No has agregado restaurantes a favoritos.</p>
    <?php elseif(isset($favorites)): ?>
        <div class="row">
            <?php $__currentLoopData = $favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favorite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="card h-100">
                        <img src="<?php echo e(asset($favorite->restaurant && $favorite->restaurant->img_restaurant ? 'img/' . $favorite->restaurant->img_restaurant : 'img/placeholder.jpg')); ?>" class="card-img-top" alt="Imagen de <?php echo e($favorite->restaurant->name ?? 'restaurante'); ?>">
                        <div class="card-body p-2">
                            <h5 class="card-title mb-1">
                                <?php if(isset($favorite->restaurant) && $favorite->restaurant !== null): ?>
                                    <?php echo e($favorite->restaurant->name); ?>

                                <?php else: ?>
                                    <span class="text-danger">Restaurante no disponible</span>
                                <?php endif; ?>
                            </h5>
                            <?php if(isset($favorite->restaurant)): ?>
                                <p class="card-text mb-1">
                                    <?php echo e(Str::limit($favorite->restaurant->description, 60)); ?>

                                </p>
                                <p class="card-text mb-1">
                                    <small class="text-muted">
                                        <?php echo e($favorite->restaurant->location ?? 'Ubicación no definida'); ?>

                                    </small>
                                </p>
                                <p class="card-text mb-1">
                                    <small class="text-muted">
                                        Precio medio: <?php echo e($favorite->restaurant->average_price ? '$' . $favorite->restaurant->average_price : 'N/D'); ?>

                                    </small>
                                </p>
                            <?php endif; ?>
                            <p class="card-text">
                                <a href="<?php echo e(route('vistas.restaurante', $favorite->restaurant->id)); ?>" class="btn btn-sm btn-primary">Ver Restaurante</a>
                                <form id="delete-form-<?php echo e($favorite->id); ?>" action="<?php echo e(route('favorites.remove', $favorite->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteFavoriteModal" data-form-id="delete-form-<?php echo e($favorite->id); ?>">
                                        Eliminar
                                    </button>
                                </form>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <p class="text-danger">Error: No se pudieron cargar los favoritos.</p>
    <?php endif; ?>
</div>

<!-- Modal de confirmación para eliminar favorito (global) -->
<div class="modal fade" id="confirmDeleteFavoriteModal" tabindex="-1" aria-labelledby="confirmDeleteFavoriteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteFavoriteModalLabel">Confirmar eliminación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de eliminar este restaurante de tus favoritos?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteFavoriteBtn">Eliminar</button>
      </div>
    </div>
  </div>
</div>
<?php /**PATH C:\wamp64\www\bcnrestaurantes\resources\views/profile/partials/favorites.blade.php ENDPATH**/ ?>