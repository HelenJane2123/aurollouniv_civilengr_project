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
                            <th>Exam Type</th>
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
                            <th>Exam Type</th>
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
                                        if ($students['exam_category_id'] == '1') {
                                    ?>
                                        Essay
                                    <?php
                                        }
                                        else {
                                    ?>
                                        Multiple Choice
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($students['with_exam'] == 2) {
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
                                            if($students['stud_exam_status'] == 0) {
                                    ?>
                                                <span class="badge badge-secondary">Not yet Started</span>
                                    <?php
                                            }
                                            else if($students['stud_exam_status'] == '1') {
                                    ?>
                                                <span class="badge badge-info">Started</span>
                                    <?php
                                            }
                                            else if($students['stud_exam_status'] == '2') {
                                    ?>
                                            <span class="badge badge-success">Completed</span>
                                    <?php
                                            }
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $score = $students['exam_score'];
                                        if(($students['score_status'] == 'Failed')) {
                                    ?>
                                            <h5><span class="badge badge-danger">Failed</span></h5>
                                    <?php
                                        }
                                        elseif($students['score_status'] == 'Satisfactory') {
                                    ?>
                                            <h5><span class="badge badge-info">Satisfactory</span></h5>
                                    <?php
                                        }
                                        elseif($students['score_status'] == 'Passed') { 
                                    ?>
                                            <h5><span class="badge badge-primary">Passed</span></h5>
                                    <?php
                                        }
                                        elseif($students['score_status'] == 'Outstanding') { 
                                    ?>
                                            <h5><span class="badge badge-success">Outstanding</span></h5>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <li class="list-inline-item">
                                        <a class="btn btn-primary btn-sm rounded-0" href="enroll_student.php?action=view_student&id=<?php echo $students['account_id']?>&student_id=<?php echo $students['student_id']?>"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-danger btn-sm rounded-0" href="admin/enroll_student.php?student_id=<?php echo $students['student_id']?>&id=<?php echo $students['account_id']?>"><i class="fa fa-trash"></i> Unenroll Student</a>
                                        <a class="btn btn-info btn-sm rounded-0" href="enroll_student.php?action=view_exam_details&student_id=<?php echo $students['student_id']?>&exam_id=<?php echo $students['exam_id']?>&program_id=<?php echo $students['program_id']?>"><i class="fa fa-paper"></i> View Exam Details</a>
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