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
        else if($admin->get_usertype($_SESSION['email_address']) == 'Professor') {
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
        <div class="row">
            <div class="col-lg-6">
                <!-- Get top 10 Students -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Top 10 Students</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Student Member ID</th>
                                        <th>Student Name</th>
                                        <th>Course</th>
                                        <th>Year</th>
                                        <th>Program Name</th>
                                        <th>Exam Score</th>
                                        <th>Professor</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Student Member ID</th>
                                        <th>Student Name</th>
                                        <th>Course</th>
                                        <th>Year</th>
                                        <th>Program Name</th>
                                        <th>Exam Score</th>
                                        <th>Professor</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        $get_top_students =  $admin->get_all_top_students();
                                        foreach($get_top_students as $top_students) {
                                    ?>
                                        <tr>
                                            <td><?php echo $top_students['student_member_id'] ?></td>
                                            <td><?php echo $top_students['student_first_name'].' '.$top_students['student_last_name'] ?></td>
                                            <td><?php echo $top_students['student_course'] ?></td>
                                            <td><?php echo $top_students['student_year'] ?></td>
                                            <td><?php echo $top_students['program_name'] ?></td>
                                            <td><?php echo $top_students['exam_score'] ?></td>
                                            <td><?php echo $top_students['prof_first_name'].' '.$top_students['prof_last_name']  ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Top Programs -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Top Programs/Exam</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Program Name</th>
                                        <th>Professor</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Program Name</th>
                                        <th>Professor</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        $get_top_exams =  $admin->get_all_top_exams();
                                        foreach($get_top_exams as $top_exams) {
                                    ?>
                                        <tr>
                                            <td><?php echo $top_exams['program_name'] ?></td>
                                            <td><?php echo $top_exams['prof_first_name'].' '.$top_exams['prof_last_name']  ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
        //Super Admin
        else {
        $get_profile_info_admin =  $admin->get_superadmin_info($_SESSION['email_address']);
    ?>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Pending for Approval</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $admin->get_all_pending_approval_cnt(); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i><br/>
                                <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="admin_users.php">See all</a>
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
                                    Total Registered Students</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $admin->get_all_students_cnt($get_profile_info_admin['member_id']) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i><br/>
                                <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="rpt_enrolled_students.php">See all</a>
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
                                    Total Programs</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $admin->get_all_programs_cnt(); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-star fa-2x text-gray-300"></i><br/>
                                <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="rpt_programs.php">See all</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <!-- Get top 10 Students -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Top 10 Students</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Student Member ID</th>
                                        <th>Student Name</th>
                                        <th>Course</th>
                                        <th>Year</th>
                                        <th>Program Name</th>
                                        <th>Exam Score</th>
                                        <th>Professor</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Student Member ID</th>
                                        <th>Student Name</th>
                                        <th>Course</th>
                                        <th>Year</th>
                                        <th>Program Name</th>
                                        <th>Exam Score</th>
                                        <th>Professor</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        $get_top_students =  $admin->get_all_top_students();
                                        foreach($get_top_students as $top_students) {
                                    ?>
                                        <tr>
                                            <td><?php echo $top_students['student_member_id'] ?></td>
                                            <td><?php echo $top_students['student_first_name'].' '.$top_students['student_last_name'] ?></td>
                                            <td><?php echo $top_students['student_course'] ?></td>
                                            <td><?php echo $top_students['student_year'] ?></td>
                                            <td><?php echo $top_students['program_name'] ?></td>
                                            <td><?php echo $top_students['exam_score'] ?></td>
                                            <td><?php echo $top_students['prof_first_name'].' '.$top_students['prof_last_name']  ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Top Programs -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Top Programs/Exam</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Program Name</th>
                                        <th>Professor</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Program Name</th>
                                        <th>Professor</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        $get_top_exams =  $admin->get_all_top_exams();
                                        foreach($get_top_exams as $top_exams) {
                                    ?>
                                        <tr>
                                            <td><?php echo $top_exams['program_name'] ?></td>
                                            <td><?php echo $top_exams['prof_first_name'].' '.$top_exams['prof_last_name']  ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
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
        </div>
    </div>  
<?php
    include('db_footer.php');
?>
            