<?php $__env->startSection('title', 'Mi Perfil'); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('status')): ?>
    <div class="container mt-4">
        <div class="alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

        </div>
    </div>
<?php endif; ?>

<!-- Encabezado con imagen de fondo y avatar -->
<div class="bg-dark text-center py-5" style="background: url('<?php echo e(asset('img/zona-usuario.jpg')); ?>') center/cover no-repeat;">
    <div class="container">
        <div class="d-flex flex-column align-items-center">
            <!-- Avatar -->
            <div class="rounded-circle border border-3 border-white overflow-hidden mb-3">
                <img src="<?php echo e(asset($user->profile_image ? 'img/' . $user->profile_image : 'img/user.jpg')); ?>" 
                     alt="Foto de perfil" style="width: 120px; height: 120px;
                     class="img-fluid rounded-circle profile-img">
            </div>
            <h3 class="mb-1 text-dark"><?php echo e($user->name); ?> <?php echo e($user->last_name); ?></h3>
            <p class="mb-3 text-dark">
                Antigüedad: <?php echo e($user->created_at?->diffForHumans() ?? 'No definido'); ?>

            </p>
            <!-- Formulario oculto para actualizar la foto -->
            <form id="fotoForm" action="<?php echo e(route('user.update')); ?>" method="POST" enctype="multipart/form-data" style="position: absolute; left: -9999px;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="file" name="photo" id="photoInput" onchange="document.getElementById('fotoForm').submit();">
            </form>
            <!-- Botón para subir foto -->
            <button class="btn btn-secondary" id="btnSubirFoto">Subir foto</button>
            <!-- Botón para eliminar foto (visible solo si hay imagen subida) -->
            <?php if($user->profile_image): ?>
                <form id="deletePhotoForm" action="<?php echo e(route('user.photo.delete')); ?>" method="POST" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="button" class="btn btn-danger" id="btnEliminarFoto">Eliminar foto</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Contenedor de pestañas -->
<div class="container mt-4">
    <!-- Navegación de pestañas -->
    <ul class="nav nav-tabs" id="perfilTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="datos-tab" data-bs-toggle="tab" data-bs-target="#datos" type="button" role="tab" aria-controls="datos" aria-selected="true">
                Mis datos
            </button>
        </li>
        
    </ul>

    <!-- Botón lateral "Mi perfil" -->
    <div class="text-end mt-2">
        <a href="<?php echo e(route('profile.profile-all')); ?>" class="btn btn-warning text-white" style="background-color: #f26522; border: none;">Mi perfil</a>
    </div>

    <!-- Contenido de las pestañas -->
    <div class="tab-content mt-4" id="perfilTabContent">
        <!-- Pestaña: Mis datos -->
        <div class="tab-pane fade show active" id="datos" role="tabpanel" aria-labelledby="datos-tab">
            <h5>Mis datos</h5>
            <form id="datosForm" action="<?php echo e(route('user.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', $user->name)); ?>">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo e(old('last_name', $user->last_name)); ?>">
                        <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email', $user->email)); ?>">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-text">+34</span>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo e(old('phone_number', $user->phone_number)); ?>">
                            <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Contraseña</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="••••••">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <button class="btn btn-outline-secondary toggle-password" type="button">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="••••••">
                    </div>
                </div>
                
                <!-- Botón para guardar cambios -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
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
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/perfil.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla_restaurante', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\bcnrestaurantes\resources\views/profile/profile.blade.php ENDPATH**/ ?>