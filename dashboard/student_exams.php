<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">My Exams</h1>
    <p class="mb-4">Displays list of student's exams and ongoing exams.</p>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Program</th>
                            <th>Exam</th>
                            <th>Status</th>
                            <th>My Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Program</th>
                            <th>Exam</th>
                            <th>Status</th>
                            <th>My Score</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $get_profile_info =  $student->get_student_info($_SESSION['email_address']);
                            //get program list by member_id
                            $get_program_list =  $student->get_my_exam($get_profile_info['id']);
                            foreach($get_program_list as $programs) {
                        ?>
                            <tr>
                                <td><?php echo $programs['program_name'] ?></td>
                                <td><?php echo $programs['exam_description'] ?></td>
                                <td>
                                    <?php
                                        if($programs['exam_status'] == '0') {
                                    ?>
                                        <h5><span class="badge badge-secondary">Not yet started</span></h5>
                                    <?php
                                        }
                                        elseif($programs['exam_status'] == '1') {
                                    ?>
                                        <h5><span class="badge badge-warning">Ongoing</span></h5>
                                    <?php
                                        }
                                        elseif($programs['exam_status'] == '2') { 
                                    ?>
                                        <h5><span class="badge badge-success">Completed</span></h5>
                                    <?php
                                        }
                                        else {
                                    ?>
                                        <h5><span class="badge badge-info">No exam setup yet</span></h5>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    0
                                </td>
                                <td>
                                    <?php
                                        if($programs['exam_id'] != '') {
                                    ?>
                                        <a class="btn btn-success" href="take_exam.php?program_id=<?php echo $program_list['program_id']?>">Take Exam</a>
                                        <a class="btn btn-primary" href="view_exam_details.php?program_id=<?php echo $program_list['program_id']?>">View Exam Details</a>
                                    <?php
                                        }
                                    ?>
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