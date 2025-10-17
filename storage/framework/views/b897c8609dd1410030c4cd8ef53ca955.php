<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة الطلاب</title>
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
            <button class="btn btn-success" onclick="window.location='<?php echo e(url('/register')); ?>'">
                + إضافة طالب جديد
            </button>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary">قائمة الطلاب</h3>
            <input type="text" class="form-control w-25" placeholder="🔍 ابحث عن طالب...">
        </div>

        <!-- جدول الطلاب -->
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الصف</th>
                            <th>النتيجة</th>
                            <th>الواجب</th>
                            <th>التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- الطالب 1 -->
                        <tr>
                            <td>1</td>
                            <td>أحمد محمد</td>
                            <td>الثالث</td>
                            <td>85%</td>
                            <td>مكتمل</td>
                            <td>
                                <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailsModal1">
                                    👁️ عرض التفاصيل
                                </button>
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#controlModal1">
                                    ⚙️ تقييم
                                </button>
                            </td>
                        </tr>

                        <!-- الطالب 2 -->
                        <tr>
                            <td>2</td>
                            <td>سارة علي</td>
                            <td>الثاني</td>
                            <td>90%</td>
                            <td>قيد التنفيذ</td>
                            <td>
                                <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailsModal2">
                                    👁️ عرض التفاصيل
                                </button>
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#controlModal2">
                                    ⚙️ تقييم
                                </button>
                            </td>
                        </tr>

                        <!-- الطالب 3 -->
                        <tr>
                            <td>3</td>
                            <td>محمد عمر</td>
                            <td>الأول</td>
                            <td>78%</td>
                            <td>غير مكتمل</td>
                            <td>
                                <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailsModal3">
                                    👁️ عرض التفاصيل
                                </button>
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#controlModal3">
                                    ⚙️ تقييم
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- ===== مودال عرض التفاصيل (لكل طالب) ===== -->
    <div class="modal fade" id="detailsModal1" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">تفاصيل الطالب: أحمد محمد</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-end">
                    <p><strong>الاسم:</strong> أحمد محمد</p>
                    <p><strong>الصف:</strong> الثالث</p>
                    <p><strong>النتيجة العامة:</strong> 85%</p>
                    <p><strong>الواجب:</strong> مكتمل</p>
                    <p><strong>ملاحظات المعلم:</strong> مجتهد جدًا، يحتاج تحسين في القراءة.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailsModal2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">تفاصيل الطالبة: سارة علي</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-end">
                    <p><strong>الاسم:</strong> سارة علي</p>
                    <p><strong>الصف:</strong> الثاني</p>
                    <p><strong>النتيجة العامة:</strong> 90%</p>
                    <p><strong>الواجب:</strong> قيد التنفيذ</p>
                    <p><strong>ملاحظات المعلم:</strong> ممتازة في الحساب ولكن تحتاج تركيزًا أكبر في التعبير.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailsModal3" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">تفاصيل الطالب: محمد عمر</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-end">
                    <p><strong>الاسم:</strong> محمد عمر</p>
                    <p><strong>الصف:</strong> الأول</p>
                    <p><strong>النتيجة العامة:</strong> 78%</p>
                    <p><strong>الواجب:</strong> غير مكتمل</p>
                    <p><strong>ملاحظات المعلم:</strong> يحتاج دعمًا إضافيًا في مادة العلوم.</p>
                </div>
            </div>
        </div>
    </div>


    <!-- ===== مودال تقييم الطالب ===== -->
    <div class="modal fade" id="controlModal1" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form>
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">تقييم الطالب: أحمد محمد</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">الدرجة (%)</label>
                        <input type="number" class="form-control mb-3" min="0" max="100" placeholder="اكتب الدرجة">

                        <label class="form-label">تعليق المعلم</label>
                        <textarea class="form-control mb-3" rows="3" placeholder="أضف ملاحظاتك هنا..."></textarea>

                        <label class="form-label">حالة الواجب</label>
                        <select class="form-select">
                            <option>مكتمل</option>
                            <option>قيد التنفيذ</option>
                            <option>غير مكتمل</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-success">💾 حفظ التقييم</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ===== Bootstrap JS ===== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\school management system\school\resources\views/student.blade.php ENDPATH**/ ?>