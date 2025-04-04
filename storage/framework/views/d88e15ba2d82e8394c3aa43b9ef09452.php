

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h1 class="mb-4">Проекты</h1>

    <a href="<?php echo e(route('projects.create')); ?>" class="btn btn-primary mb-4">Добавить проект</a>

    <?php if($projects->count()): ?>
        <div class="row">
            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h2 class="card-title"><?php echo e($project->name); ?></h2>
                            <p class="card-text"><?php echo e($project->description); ?></p>

                            <p class="card-text">
                                <strong>Навыки:</strong>
                                <?php echo e($project->skills->pluck('name')->implode(', ')); ?>

                            </p>

                            <div class="mt-auto">
                                <a href="<?php echo e(route('projects.edit', $project)); ?>" class="btn btn-warning btn-sm me-2">
                                    Редактировать
                                </a>

                                <form 
                                    action="<?php echo e(route('projects.destroy', $project)); ?>" 
                                    method="POST" 
                                    class="d-inline"
                                    onsubmit="return confirm('Вы уверены, что хотите удалить этот проект?');"
                                >
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Удалить
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info">
            Проектов пока нет. Вы можете добавить новый проект.
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Games\OSPanel\domains\portfolio\resources\views/projects/index.blade.php ENDPATH**/ ?>