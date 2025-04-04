

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h1 class="mb-4">Редактировать навык</h1>

    <form action="<?php echo e(route('skills.update', $skill)); ?>" method="POST" class="w-50">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="name" class="form-label">Название навыка:</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                value="<?php echo e($skill->name); ?>" 
                class="form-control" 
                placeholder="Введите название навыка" 
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Games\OSPanel\domains\portfolio\resources\views/skills/edit.blade.php ENDPATH**/ ?>