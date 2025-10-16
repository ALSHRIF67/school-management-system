<!-- resources/views/student-dashboard.blade.php -->




<section class="py-5">
    <div class="container">
        <div class="card shadow rounded-4 p-4">
            <h2 class="text-center mb-4">لوحة تحكم الطالب</h2>

            <?php if(session('success')): ?>
                <div class="alert alert-success text-center">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger text-center">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <p>مرحباً، <strong><?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?></strong>!</p>
            <p>البريد الإلكتروني: <strong><?php echo e(auth()->user()->email); ?></strong></p>
            <p>نوع الحساب: <strong><?php echo e(ucfirst(auth()->user()->user_type)); ?></strong></p>

            <div class="mt-4 text-center">
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger">تسجيل الخروج</button>
                </form>
            </div>
        </div>
    </div>
</section>


<?php echo $__env->make('welcome', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\school management system\school\resources\views/studentdashboard.blade.php ENDPATH**/ ?>