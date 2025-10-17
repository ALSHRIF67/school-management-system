

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2 class="mb-3">نتائج الطالب: <?php echo e($student['name']); ?></h2>

    <?php if(session('status')): ?>
        <div class="alert alert-success"><?php echo e(session('status')); ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('teacher.students.results.update', ['id' => $student['id']])); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">الدرجة</label>
                    <div class="col-sm-4">
                        <input type="number" name="grade" value="<?php echo e($student['grade']); ?>" min="0" max="100" class="form-control">
                    </div>
                </div>
                <button class="btn btn-primary">حفظ</button>
                <a href="<?php echo e(route('teacher.students')); ?>" class="btn btn-secondary">عودة</a>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frotend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\school management system\school\resources\views/student_results.blade.php ENDPATH**/ ?>