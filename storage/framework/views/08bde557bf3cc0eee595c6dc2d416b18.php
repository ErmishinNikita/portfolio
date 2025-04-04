

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h1 class="mb-4">Добавить проект</h1>

    <form action="<?php echo e(route('projects.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="name" class="form-label">Название:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание:</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Навыки:</label>
            <div class="form-check">
                <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name="skills[]" 
                            value="<?php echo e($skill->id); ?>" 
                            id="skill-<?php echo e($skill->id); ?>"
                        >
                        <label class="form-check-label" for="skill-<?php echo e($skill->id); ?>">
                            <?php echo e($skill->name); ?>

                        </label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Games\OSPanel\domains\portfolio\resources\views/projects/create.blade.php ENDPATH**/ ?>