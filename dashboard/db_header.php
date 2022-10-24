<?php 
    session_start();
    require_once '../model/RegisterLogin.php';
    $user = new User(); 
    //echo $id = $_SESSION['id'];
    // if (!$user->get_session()){
    //     header("location:../dashboard/index.php");
    // }

    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:../dashboard/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
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
            <?php if ($user->get_usertype($_SESSION['email_address']) == 'Student') { ?>
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
                <li class="nav-item">
                    <a class="nav-link" href="admin_exam_cat.php">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Exam Category</span>
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
                <?php if (($user->get_usertype($_SESSION['email_address'])) === 'Student') { ?>
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
            <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- notification message -->
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif ?>
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- logged in user information -->
                            <?php  if (isset($_SESSION['email_address'])) : ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome, <strong><?php echo $user->get_fullname($_SESSION['email_address']); ?> (<?php echo $user->get_usertype($_SESSION['email_address']); ?>)</strong></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            <?php endif ?>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../index.php?q=logout">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                