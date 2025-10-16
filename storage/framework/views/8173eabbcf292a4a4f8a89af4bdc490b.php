

<div class="container mt-5">
    <h2>لوحة تحكم المعلم</h2>
    <p>مرحبًا بك <?php echo e(auth()->user()->first_name); ?>!</p>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-danger">تسجيل الخروج</button>
    </form>
</div>

<?php echo $__env->make('welcome', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\school management system\school\resources\views/teacherdashboard.blade.php ENDPATH**/ ?>