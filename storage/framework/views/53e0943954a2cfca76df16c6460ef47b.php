<?php $__env->startSection('title', 'Mi Perfil'); ?>

<?php $__env->startSection('content'); ?>
<?php if(!Auth::check()): ?>
    <script>
        window.location.href = "<?php echo e(route('login')); ?>";
    </script>
<?php else: ?>
    <!-- Encabezado (igual que antes) -->
    <div class="bg-dark text-center py-5" style="background: url('<?php echo e(asset('img/zona-usuario.jpg')); ?>') center/cover no-repeat;">
        <div class="container">
            <div class="d-flex flex-column align-items-center">
                <div class="rounded-circle border border-3 border-white overflow-hidden mb-3" style="width: 120px; height: 120px;">
                    <img src="<?php echo e(asset($user->profile_image ? 'img/' . $user->profile_image : 'img/user.jpg')); ?>" 
                         alt="Foto de perfil" 
                         style="width: 120px; height: 120px;" 
                         class="img-fluid rounded-circle profile-img">
                </div>
                <h3 class="mb-1 text-dark"><?php echo e($user->name); ?> <?php echo e($user->last_name); ?></h3>
                <p class="mb-3 text-dark">
                    Antigüedad: <?php echo e($user->created_at?->diffForHumans() ?? 'No definido'); ?>

                </p>
                <!-- Botones para foto (igual que antes) -->
                <form id="fotoForm" action="<?php echo e(route('user.update')); ?>" method="POST" enctype="multipart/form-data" style="position: absolute; left: -9999px;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="file" name="photo" id="photoInput" onchange="document.getElementById('fotoForm').submit();">
                </form>
                <div class="d-flex gap-2">
                    <button class="btn btn-secondary" id="btnSubirFoto">
                        <i class="bi bi-upload"></i>
                    </button>
                    <?php if($user->profile_image): ?>
                        <form id="deletePhotoForm" action="<?php echo e(route('user.photo.delete')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                        </form>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                            <i class="bi bi-trash"></i>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if(session('status')): ?>
        <div class="container mt-4">
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        </div>
    <?php endif; ?>

    <!-- Navegación de pestañas -->
    <div class="container mt-4">
        <ul class="nav nav-tabs" id="perfilTabs" role="tablist">
            <!-- Pestaña: Mis datos -->
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="datos-tab" data-bs-toggle="tab" data-bs-target="#datos-pane" type="button" role="tab" aria-controls="datos-pane" aria-selected="true">
                    Mis datos
                </button>
            </li>
            <!-- Pestaña: Mis reseñas -->
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reseñas-tab" data-bs-toggle="tab" data-bs-target="#resenas-pane" type="button" role="tab" aria-controls="resenas-pane" aria-selected="false">
                    Mis reseñas (<?php echo e(isset($reviews) ? $reviews->count() : 0); ?>)
                </button>
                
            </li>
            <!-- Pestaña: Mis favoritos -->
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="favoritos-tab" data-bs-toggle="tab" data-bs-target="#favoritos-pane" type="button" role="tab" aria-controls="favoritos-pane" aria-selected="false">
                    Mis favoritos (<?php echo e(isset($favorites) ? $favorites->count() : 0); ?>)
                </button>
            </li>
        </ul>

        <!-- Contenido de las pestañas -->
        <div class="tab-content mt-4" id="perfilTabsContent">
            <!-- Contenido: Mis datos -->
            <div class="tab-pane fade show active" id="datos-pane" role="tabpanel" aria-labelledby="datos-tab">
                <?php echo $__env->make('profile.partials.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <!-- Contenido: Mis reseñas -->
            <div class="tab-pane fade" id="resenas-pane" role="tabpanel" aria-labelledby="reseñas-tab">
                <?php echo $__env->make('profile.partials.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <!-- Contenido: Mis favoritos -->
            <div class="tab-pane fade" id="favoritos-pane" role="tabpanel" aria-labelledby="favoritos-tab">
                <?php echo $__env->make('profile.partials.favorites', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación para eliminar la foto -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
              ¿Estás seguro de eliminar la foto de perfil?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/perfil.js')); ?>"></script>
    <script src="<?php echo e(asset('js/favorites.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla_restaurante', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\bcnrestaurantes\resources\views/profile/profile-all.blade.php ENDPATH**/ ?>