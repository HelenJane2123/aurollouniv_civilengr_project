
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
                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="student_survey.php">
                        <i class="fas fa-fw fa-list"></i>
                        <span>My Survey</span>
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
                <li class="nav-item">
                    <a class="nav-link" href="admin_chart.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Analytics</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="admin_survey.php">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Survey</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_survey_questions.php">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Survey Questions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_survey_list.php">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Student Survey List</span>
                    </a>
                </li>    
            <?php } ?>
            <!-- End Student Access -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->