<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <?php if (isset($_SESSION['message_success'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['message_success']; 
                unset($_SESSION['message_success']);
            ?>
        </div>
    <?php endif ?>
    <h1 class="h3 mb-2 text-gray-800">List of Students</h1>
    <p class="mb-4">Displays list of student's who take the exam and their scores.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a class="btn btn-primary" href="enroll_student.php?action=add">Enroll a Student</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Student Member ID</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Enrolled Program</th>
                            <th>With Exam</th>
                            <th>Exam Status</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Student Name</th>
                            <th>Student Member ID</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Enrolled Program</th>
                            <th>With Exam</th>
                            <th>Exam Status</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $get_profile_info =  $admin->get_admin_info($_SESSION['email_address']);
                            //get program list by member_id
                            $get_students_list =  $admin->get_all_students_list($get_profile_info['member_id']);
                            foreach($get_students_list as $students) {
                        ?>
                            <tr>
                                <td><?php echo $students['firstname'].' '.$students['last_name'] ?></td>
                                <td><?php echo $students['student_member_id'] ?></td>
                                <td><?php echo $students['course'] ?></td>
                                <td><?php echo $students['academic_year'] ?></td>
                                <td><?php echo $students['program_name'] ?></td>
                                <td>
                                    <?php
                                        if($students['with_exam'] == 0) {
                                    ?>
                                        <span class="badge badge-secondary">No exam linked</span>
                                    <?php
                                        }
                                        else {
                                    ?>
                                        <span class="badge badge-success">With Exam</span>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($students['with_exam'] != 0) {
                                            if($students['exam_status'] == 0) {
                                    ?>
                                                <span class="badge badge-secondary">Not yet Started</span>
                                    <?php
                                            }
                                            else if($students['exam_status'] == '1') {
                                    ?>
                                                <span class="badge badge-success">Started</span>
                                    <?php
                                            }
                                        }
                                    ?>
                                </td>
                                <td><span class="badge badge-secondary"><?php echo $students['exam_score'] ?></span></td>
                                <td>
                                    <li class="list-inline-item">
                                        <a class="btn btn-primary btn-sm rounded-0" href="enroll_student.php?action=view_student&id=<?php echo $students['account_id']?>"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-danger btn-sm rounded-0" href="admin/enroll_student.php?id=<?php echo $students['account_id']?>"><i class="fa fa-trash"></i> Unenroll Student</a>
                                    </li>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
    include_once('db_footer.php');
?>