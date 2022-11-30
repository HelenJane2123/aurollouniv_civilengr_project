<?php
    include('db_header.php');
?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <?php
        $get_profile_info =  $student->get_student_info($_SESSION['email_address']);
        if ($admin->get_usertype($_SESSION['email_address']) == 'Student') { ?>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Lessons</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $student->get_all_lessons($get_profile_info['member_id']) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Not yet Started
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $student->get_all_students_not_started($get_profile_info['member_id']) ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ongoing Exams
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $student->get_all_students_ongoing($get_profile_info['member_id']) ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Completed Exams</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $student->get_all_students_completed($get_profile_info['member_id']) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-star fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
        else {
            $get_profile_info_admin =  $admin->get_admin_info($_SESSION['email_address']);
    ?>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Programs</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $admin->get_all_programs_count($get_profile_info_admin['member_id']) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i><br/>
                                <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="admin_programs.php">See all</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Enrolled Students</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $admin->get_all_students_count($get_profile_info_admin['member_id']) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i><br/>
                                <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="admin_students.php">See all</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Programs with Exam</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $admin->get_all_program_exam_count($get_profile_info_admin['member_id']) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-star fa-2x text-gray-300"></i><br/>
                                <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="admin_exams.php">See all</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Web Reviewer for Araullians Program (WRAP)</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="img/undraw_posting_photo.svg" alt="...">
                    </div>
                    <p>Web Reviewer for Araullians Program (WRAP) is a web-based review platform for Civil Engineering students of the College of Information Technology and Engineering (CITE) of the PHINMA-Araullo University aiming to take the Civil Engineering Licensure Examination after graduation.</p>
                    <p>Starting as a thesis project of selected graduating BS Information Technology students, WRAP has integrated the PHINMA instructional design and pedagogical concepts to ensure optimum learning and to keep the students abreast with all latest knowledge, trends, and challenges in the industry. It currently covers the three subject areas included in the Civil Engineering Licensure Examination, namely: Surveying, Mathematics, and Transportation Engineering; Hydraulics and Geotechnical Engineering; and the Construction and Structural Engineering.</p>
                    <p>WRAP is geared towards future expansion, with its core concept and design made flexible to accommodate other tertiary education programs with board examinations.</p>
                </div>
            </div>

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lorem Ipsum</h6>
                </div>
                <div class="card-body">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>

        </div>
    </div>  
<?php
    include('db_footer.php');
?>
            