

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2 class="mb-4">الواجبات</h2>

    <?php $__currentLoopData = $assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5><?php echo e($a['name']); ?></h5>
            <p class="text-muted"><?php echo e($a['description']); ?></p>
            <h6>حالة التسليم</h6>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الطالب</th>
                        <th>البريد</th>
                        <th>تم التسليم</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($s['id']); ?></td>
                        <td><?php echo e($s['name']); ?></td>
                        <td><?php echo e($s['email']); ?></td>
                        <td>
                            <?php if(in_array($s['id'], $a['submissions'])): ?>
                                <span class="text-success">نعم</span>
                            <?php else: ?>
                                <span class="text-danger">لا</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <form method="POST" action="<?php echo e(route('teacher.students.toggleSubmission')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="assignment_id" value="<?php echo e($a['id']); ?>">
                                <input type="hidden" name="student_id" value="<?php echo e($s['id']); ?>">
                                <button class="btn btn-sm btn-outline-primary">تبديل</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frotend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\school management system\school\resources\views/student_assignments.blade.php ENDPATH**/ ?>