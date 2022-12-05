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
                            <th>Exam Type</th>
                            <th width="55%">Exam Description</th>
                            <th>Retakes</th>
                            <th>Status</th>
                            <th>My Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Program</th>
                            <th>Exam Type</th>
                            <th width="55%">Exam Description</th>
                            <th>Retakes</th>
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
                                <td>
                                    <?php 
                                        if ($programs['exam_category_id'] == '2') {
                                    ?>
                                        Multiple Choice
                                    <?php
                                        } 
                                        else {
                                    ?>
                                        Essay
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $programs['exam_description'] ?>
                                </td>
                                <td>
                                    <?php echo $programs['exam_attempt'] ?>
                                </td>
                                <td>
                                    <?php
                                        if($programs['stud_exam_status'] == 0) {
                                    ?>
                                        <h5><span class="badge badge-secondary">Not yet started</span></h5>
                                    <?php
                                        }
                                        elseif($programs['stud_exam_status'] == 1) {
                                    ?>
                                        <h5><span class="badge badge-warning">Ongoing</span></h5>
                                    <?php
                                        }
                                        elseif($programs['stud_exam_status'] == 2) { 
                                    ?>
                                        <h5><span class="badge badge-success">Completed</span></h5>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                <?php
                                        echo $score = $programs['exam_score'];
                                        if(($programs['score_status'] == 'Failed')) {
                                    ?>
                                            <h5><span class="badge badge-danger">Failed</span></h5>
                                    <?php
                                        }
                                        elseif($programs['score_status'] == 'Satisfactory') {
                                    ?>
                                            <h5><span class="badge badge-info">Satisfactory</span></h5>
                                    <?php
                                        }
                                        elseif($programs['score_status'] == 'Passed') { 
                                    ?>
                                            <h5><span class="badge badge-primary">Passed</span></h5>
                                    <?php
                                        }
                                        elseif($programs['score_status'] == 'Outstanding') { 
                                    ?>
                                            <h5><span class="badge badge-success">Outstanding</span></h5>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        //Multiple Choice
                                        if ($programs['exam_category_id'] == '2') {
                                            if($programs['exam_attempt'] == '0') {
                                    ?>
                                                <a class="btn btn-success" href="take_exam.php?exam_id=<?php echo $programs['exam_id']?>&program_name=<?php echo $programs['program_name']?>&exam_cat=<?php echo $programs['exam_category_id']?>&student_id=<?php echo $programs['student_id']?>">Take Exam</a>
                                                <a class="btn btn-primary" href="view_exam_details.php?exam_id=<?php echo $programs['exam_id']?>&program_id=<?php echo $programs['program_id']?>&student_id=<?php echo $programs['student_id']?>&exam_cat=<?php echo $programs['exam_category_id']?>">View Exam</a>
                                    <?php
                                            }
                                            elseif($programs['exam_attempt'] < 3 && $programs['exam_attempt'] != '0') {
                                    ?>
                                                <a class="btn btn-success" href="take_exam.php?exam_id=<?php echo $programs['exam_id']?>&program_name=<?php echo $programs['program_name']?>&exam_cat=<?php echo $programs['exam_category_id']?>&student_id=<?php echo $programs['student_id']?>">Retake Exam</a>
                                                <a class="btn btn-primary" href="view_exam_details.php?exam_id=<?php echo $programs['exam_id']?>&program_id=<?php echo $programs['program_id']?>&student_id=<?php echo $programs['student_id']?>&exam_cat=<?php echo $programs['exam_category_id']?>">View Exam</a>
                                    <?php
                                            }
                                            //Disable button
                                            else {
                                    ?>
                                                <h5>You have already reached the maximum take of this exam.</h5>
                                                <a class="btn btn-primary" href="view_exam_details.php?exam_id=<?php echo $programs['exam_id']?>&program_id=<?php echo $programs['program_id']?>&student_id=<?php echo $programs['student_id']?>&exam_cat=<?php echo $programs['exam_category_id']?>">View Exam</a>
                                    <?php
                                            }
                                        }
                                        //Essay
                                        else {
                                    ?>
                                        <a class="btn btn-success" href="take_exam.php?exam_id=<?php echo $programs['exam_id']?>&program_name=<?php echo $programs['program_name']?>&exam_cat=<?php echo $programs['exam_category_id']?>&student_id=<?php echo $programs['student_id']?>">Take Exam</a>
                                        <a class="btn btn-primary" href="view_exam_details.php?program_id=<?php echo $programs['program_id']?>&student_id=<?php echo $programs['student_id']?>&exam_cat=<?php echo $programs['exam_category_id']?>">View Exam</a>
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