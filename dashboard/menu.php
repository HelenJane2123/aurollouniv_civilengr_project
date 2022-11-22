
       <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3"><img src="../assets/img/logo.png" height="85px" /></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- Student Access -->
            <?php if ($admin->get_usertype($_SESSION['email_address']) == 'Student') { ?>
                <li class="nav-item">
                    <a class="nav-link" href="student_profile.php">
                        <i class="fas fa-fw fa-user"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="student_programs.php">
                        <i class="fas fa-fw fa-paperclip"></i>
                        <span>My Programs/Lessons</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="student_exams.php">
                        <i class="fas fa-fw fa-file"></i>
                        <span>My Exams</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="student_scores.php">
                        <i class="fas fa-fw fa-star"></i>
                        <span>My Scores</span>
                    </a>
                </li>
            <?php } else { ?>
            <!-- Teacher Access -->
                <li class="nav-item">
                    <a class="nav-link" href="admin_profile.php">
                        <i class="fas fa-fw fa-user"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_programs.php">
                        <i class="fas fa-fw fa-paperclip"></i>
                        <span>Programs/Lessons</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="admin_exam_cat.php">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Exam Category</span>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="admin_exams.php">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Exams</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_students.php">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Students</span>
                    </a>
                </li>
            <?php } ?>
            <!-- End Student Access -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Settings</span>
                </a>
                <?php if (($admin->get_usertype($_SESSION['email_address'])) === 'Student') { ?>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Forgot Password</h6>
                            <a class="collapse-item" href="../forgot-password.php">Change Password</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Forgot Password</h6>
                            <a class="collapse-item" href="login.html">Change Password</a>
                            <h6 class="collapse-header">Reports</h6>
                            <a class="collapse-item" href="login.html">Report 1</a>
                            <a class="collapse-item" href="login.html">Report 2</a>
                            <a class="collapse-item" href="login.html">Report 3</a>
                        </div>
                    </div>
                <?php }  ?>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->