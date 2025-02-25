<?php $__env->startSection('title', "Gestión de $title"); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/admin/restaurantsManagement.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.crud', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\bcnrestaurantes\resources\views/admin/restaurants.blade.php ENDPATH**/ ?>