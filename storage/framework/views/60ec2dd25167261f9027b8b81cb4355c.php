<!-- resources/views/profile/partials/reviews.blade.php -->
<div>
    <h4>Mis reseñas</h4>
    <?php if(isset($reviews) && $reviews->isEmpty()): ?>
        <p>No has dejado ninguna reseña todavía.</p>
    <?php elseif(isset($reviews)): ?>
        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php if(isset($review->restaurant) && $review->restaurant !== null): ?>
                            <?php echo e($review->restaurant->name); ?>

                        <?php else: ?>
                            <span class="text-danger">Restaurante no disponible</span>
                        <?php endif; ?>
                    </h5>
                    <p class="card-text">Calificación: <?php echo e($review->score); ?> ⭐</p>
                    <p class="card-text"><?php echo e($review->comment); ?></p>
                    <small class="text-muted">Publicado el <?php echo e($review->created_at->format('d/m/Y')); ?></small>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <p class="text-danger">Error: No se pudieron cargar las reseñas.</p>
    <?php endif; ?>
</div>
<?php /**PATH C:\wamp64\www\bcnrestaurantes\resources\views/profile/partials/reviews.blade.php ENDPATH**/ ?>