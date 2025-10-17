<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>لوحة تحكم المعلم</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Icons & Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- FullCalendar -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- القائمة الجانبية -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="#" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-chalkboard-teacher me-2"></i>لوحة المعلم</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="#" class="nav-item nav-link active"><i class="fa fa-home me-2"></i>الرئيسية</a>
                    <a href="#" class="nav-item nav-link"><i class="fa fa-book me-2"></i>المواد الدراسية</a>
     
<a href="<?php echo e(route('teacher.students')); ?>" class="nav-item nav-link"> <i class="fa fa-users me-2"></i> الطلاب </a>

                    <a href="#" class="nav-item nav-link"><i class="fa fa-calendar me-2"></i>الجدول الدراسي</a>
                    <a href="#" class="nav-item nav-link"><i class="fa fa-file-alt me-2"></i>التقارير</a>
                    <a href="#" class="nav-item nav-link"><i class="fa fa-cog me-2"></i>الإعدادات</a>
                </div>
            </nav>
        </div>
        <!-- نهاية القائمة الجانبية -->

        <!-- محتوى الصفحة -->
        <div class="content">
            <!-- شريط التنقل العلوي -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-tie"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0"><i class="fa fa-bars"></i></a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">أ. <?php echo e(Auth::user()->name ?? 'المعلم'); ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">الملف الشخصي</a>
                            <a href="#" class="dropdown-item">الإعدادات</a>
                            <a href="<?php echo e(route('logout')); ?>" class="dropdown-item">تسجيل الخروج</a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- البطاقات الإحصائية -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-white"></i>
                            <div class="ms-3 text-white">
                                <p class="mb-2">عدد الطلاب</p>
                                <h6 class="mb-0">120</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-success rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-book fa-3x text-white"></i>
                            <div class="ms-3 text-white">
                                <p class="mb-2">عدد المواد</p>
                                <h6 class="mb-0">6</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-warning rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-tasks fa-3x text-white"></i>
                            <div class="ms-3 text-white">
                                <p class="mb-2">الواجبات اليوم</p>
                                <h6 class="mb-0">8</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-info rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-bell fa-3x text-white"></i>
                            <div class="ms-3 text-white">
                                <p class="mb-2">آخر التنبيهات</p>
                                <h6 class="mb-0">3</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- جدول الفصول الدراسية -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">الفصول الدراسية</h6>
                    <table class="table table-striped text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>الرقم</th>
                                <th>اسم الفصل</th>
                                <th>المادة</th>
                                <th>عدد الطلاب</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>الصف الأول</td>
                                <td>الرياضيات</td>
                                <td>25</td>
                                <td>
                                    <button class="btn btn-sm btn-info text-white">عرض</button>
                                    <button class="btn btn-sm btn-warning">تعديل</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>الصف الثاني</td>
                                <td>العلوم</td>
                                <td>28</td>
                                <td>
                                    <button class="btn btn-sm btn-info text-white">عرض</button>
                                    <button class="btn btn-sm btn-warning">تعديل</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>الصف الثالث</td>
                                <td>اللغة العربية</td>
                                <td>30</td>
                                <td>
                                    <button class="btn btn-sm btn-info text-white">عرض</button>
                                    <button class="btn btn-sm btn-warning">تعديل</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- آخر التنبيهات -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">آخر التنبيهات</h6>
                    <ul class="list-group">
                        <li class="list-group-item">تم رفع واجب جديد لمادة الرياضيات</li>
                        <li class="list-group-item">غياب الطالب أحمد محمد</li>
                        <li class="list-group-item">تحديث في الجدول الدراسي</li>
                    </ul>
                </div>
            </div>

            <!-- المهام القادمة -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">المهام القادمة</h6>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>المهمة</th>
                                <th>المادة</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>اختبار قصير</td>
                                <td>العلوم</td>
                                <td>2025-10-20</td>
                            </tr>
                            <tr>
                                <td>واجب منزلي</td>
                                <td>الرياضيات</td>
                                <td>2025-10-22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- التقويم السنوي -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">التقويم السنوي الأكاديمي</h6>
                    <div id="calendar"></div>
                </div>
            </div>

            <!-- تذييل الصفحة -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-3 text-center">
                    © جميع الحقوق محفوظة لنظام المدرسة 2025
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'ar',
                events: [
                    { title: 'اختبار الرياضيات', start: '2025-10-20' },
                    { title: 'اجتماع أولياء الأمور', start: '2025-10-25' }
                ]
            });
            calendar.render();
        });
    </script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\school management system\school\resources\views/teacherdashboard.blade.php ENDPATH**/ ?>