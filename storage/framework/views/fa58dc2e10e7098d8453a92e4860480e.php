<?php $__env->startSection('title', "Gestión de $title"); ?>


<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('admin.includes.userModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/admin/users/table.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin/users/userManagement.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin/users/delete.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.crud', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\bcnrestaurantes\resources\views/admin/users.blade.php ENDPATH**/ ?>