<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Araullo University - Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="css/buttons.dataTables.min.css" rel="stylesheet">
</head>
<?php 
    session_start();
    ob_start();
    require_once ('model/Admin.php');
    require_once ('model/Student.php');
    $admin = new Admin();
    $student = new Student();
    if (isset($_GET['q'])){
        $admin->user_logout();
        header("location:../dashboard/login.php");
    }

    // header("Cache-Control: no-store, no-cache, must-revalidate"); 
    // header("Cache-Control: pre-check=0, post-check=0, max-age=0"); 
    // header("Pragma: no-cache"); 
    // header("Expires: Mon, 6 Dec 1977 00:00:00 GMT"); 
    // header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
            include_once("menu.php")
        ?>
        <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- notification message -->
            <?php
                if (isset($_SESSION['message_success'])) {
            ?>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php 
                        echo $_SESSION['message_success']; 
                        unset($_SESSION['message_success']);
                    ?>
                </div>
            <?php
                }
            ?>
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
                            <?php
                                if (isset($_SESSION['email_address'])) : 
                            ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome, <strong><?php echo $admin->get_fullname($_SESSION['email_address']); ?> (<?php echo $admin->get_usertype($_SESSION['email_address']); ?>)</strong></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            <?php
                                endif 
                            ?>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <?php if ($admin->get_usertype($_SESSION['email_address']) == 'Student') { ?>
                                <a class="dropdown-item" href="student_profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                            <?php
                                }
                                else {
                            ?>
                                <a class="dropdown-item" href="admin_profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                            <?php
                                }
                            ?>
                            <!-- <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a> -->
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
                