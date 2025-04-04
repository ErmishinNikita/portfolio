

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h1 class="mb-4">Навыки</h1>

    <a href="<?php echo e(route('skills.create')); ?>" class="btn btn-primary mb-3">Добавить навык</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($skills->count()): ?>
        <ul class="list-group">
            <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo e($skill->name); ?>


                    <div class="btn-group" role="group" aria-label="Действия">
                        <a href="<?php echo e(route('skills.edit', $skill)); ?>" class="btn btn-sm btn-warning me-2">Редактировать</a>

                        <form 
                            action="<?php echo e(route('skills.destroy', $skill)); ?>" 
                            method="POST" 
                            onsubmit="return confirm('Вы уверены, что хотите удалить этот навык?');"
                        >
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php else: ?>
        <div class="alert alert-info mt-3">
            Навыков пока нет. Добавьте первый навык!
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Games\OSPanel\domains\portfolio\resources\views/skills/index.blade.php ENDPATH**/ ?>