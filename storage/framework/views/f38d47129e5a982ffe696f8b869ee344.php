<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة الطلاب</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- ===== Navbar بسيطة ===== -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(route('teacherDashboard')); ?>">لوحة المعلم</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="<?php echo e(route('teacher.studentTable')); ?>" class="nav-link active">الطلاب</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('logout')); ?>" class="nav-link text-warning"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           تسجيل الخروج
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display:none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== محتوى الصفحة ===== -->
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary">إدارة الطلاب</h3>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                + إضافة طالب جديد
            </button>
        </div>

        <!-- جدول الطلاب -->
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>البريد الإلكتروني</th>
                            <th>الصف</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $students ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($student->name); ?></td>
                                <td><?php echo e($student->email); ?></td>
                                <td><?php echo e($student->class ?? '-'); ?></td>
                                <td>
                                    <form action="<?php echo e(route('teacher.students.remove', $student->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('هل أنت متأكد من حذف هذا الطالب؟');">
                                            حذف
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-muted">لا توجد بيانات طلاب حالياً</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ===== مودال إضافة طالب ===== -->
    <div class="modal fade" id="addStudentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo e(route('teacher.students.add')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">إضافة طالب جديد</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">الاسم</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الصف</label>
                            <input type="text" name="class" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-success">إضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\school management system\school\resources\views/studentTable.blade.php ENDPATH**/ ?>