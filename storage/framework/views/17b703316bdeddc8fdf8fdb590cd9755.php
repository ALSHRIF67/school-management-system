 <!-- أو أي قالب رئيسي تستخدمه -->

<div class="container py-5">
    <h2>لوحة تحكم الموظف</h2>
    <p>مرحباً، <?php echo e($employee->name); ?>!</p>

    <a href="<?php echo e(route('logout')); ?>" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
       class="btn btn-danger">
       تسجيل الخروج
    </a>

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
        <?php echo csrf_field(); ?>
    </form>
</div>

<?php echo $__env->make('welcome', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\school management system\school\resources\views/dashboard.blade.php ENDPATH**/ ?>