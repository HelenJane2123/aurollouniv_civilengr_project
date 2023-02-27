<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">My Exams</h1>
    <p class="mb-4">Displays list of student's exams and ongoing exams.</p>
    <br/>
    <h1 class="h3 mb-2 text-gray-800">Multiple Choice</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
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
                        <th>ID</th>
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
                            $get_program_list =  $student->get_my_exam_multiple_choice($get_profile_info['id']);
                            foreach($get_program_list as $multiple_choice) {
                        ?>
                            <tr>
                                <td><?php echo $multiple_choice['student_id'] ?></td>
                                <td><?php echo $multiple_choice['program_name'] ?></td>
                                <td>
                                        Multiple Choice
                                </td>
                                <td>
                                    <?php echo $multiple_choice['exam_description'] ?>
                                </td>
                                <td>
                                    <?php 
                                        echo $multiple_choice['exam_attempt'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        
                                            if($multiple_choice['stud_exam_status'] == 0) {
                                    ?>
                                                <h5><span class="badge badge-secondary">Not yet started</span></h5>
                                    <?php
                                            }
                                            elseif($multiple_choice['stud_exam_status'] == 1) {
                                    ?>
                                                <h5><span class="badge badge-warning">Ongoing</span></h5>
                                    <?php
                                            }
                                            elseif($multiple_choice['stud_exam_status'] == 2) { 
                                    ?>
                                                <h5><span class="badge badge-success">Completed</span></h5>
                                    <?php
                                            }
                                    ?>
                                </td>
                                <td>
                                <?php
                                        
                                            echo $score = $multiple_choice['exam_score'];
                                            if(($multiple_choice['score_status'] == 'Failed')) {
                                    ?>
                                                <h5><span class="badge badge-danger">Failed</span></h5>
                                    <?php
                                            }
                                            elseif($multiple_choice['score_status'] == 'Satisfactory') {
                                    ?>
                                                <h5><span class="badge badge-info">Satisfactory</span></h5>
                                    <?php
                                            }
                                            elseif($multiple_choice['score_status'] == 'Passed') { 
                                    ?>
                                                <h5><span class="badge badge-primary">Passed</span></h5>
                                    <?php
                                            }
                                            elseif($multiple_choice['score_status'] == 'Outstanding') { 
                                    ?>
                                                <h5><span class="badge badge-success">Outstanding</span></h5>
                                    <?php
                                            }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        
                                            if($multiple_choice['exam_attempt'] == '0') {
                                    ?>
                                                <a class="btn btn-success" href="take_exam.php?exam_id=<?php echo $multiple_choice['exam_id']?>&program_name=<?php echo $multiple_choice['program_name']?>&exam_cat=<?php echo $multiple_choice['exam_category_id']?>&student_id=<?php echo $multiple_choice['student_id']?>">Take Exam</a>
                                                <a class="btn btn-primary" href="view_exam_details.php?exam_id=<?php echo $multiple_choice['exam_id']?>&program_id=<?php echo $multiple_choice['program_id']?>&student_id=<?php echo $multiple_choice['student_id']?>&exam_cat=<?php echo $multiple_choice['exam_category_id']?>">View Exam</a>
                                    <?php
                                            }
                                            elseif($multiple_choice['exam_attempt'] < 3 && $multiple_choice['exam_attempt'] != '0') {
                                    ?>
                                                <a class="btn btn-success" href="take_exam.php?exam_id=<?php echo $multiple_choice['exam_id']?>&program_name=<?php echo $multiple_choice['program_name']?>&exam_cat=<?php echo $multiple_choice['exam_category_id']?>&student_id=<?php echo $multiple_choice['student_id']?>">Retake Exam</a>
                                                <a class="btn btn-primary" href="view_exam_details.php?exam_id=<?php echo $multiple_choice['exam_id']?>&program_id=<?php echo $multiple_choice['program_id']?>&student_id=<?php echo $multiple_choice['student_id']?>&exam_cat=<?php echo $multiple_choice['exam_category_id']?>">View Exam</a>
                                    <?php
                                            }
                                            //Disable button
                                            else {
                                    ?>
                                                <h5>You have already reached the maximum take of this exam.</h5>
                                                <a class="btn btn-primary" href="view_exam_details.php?exam_id=<?php echo $multiple_choice['exam_id']?>&program_id=<?php echo $multiple_choice['program_id']?>&student_id=<?php echo $multiple_choice['student_id']?>&exam_cat=<?php echo $multiple_choice['exam_category_id']?>">View Exam</a>
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

    <h1 class="h3 mb-2 text-gray-800">Essay</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
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
                        <th>ID</th>
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
                            $get_essay_result =  $student->get_my_exam_result_essay($get_profile_info['id']);
                            foreach($get_essay_result as $essay) {
                        ?>
                            <tr>
                                <td><?php echo $essay['student_id'] ?></td>
                                <td><?php echo $essay['program_name'] ?></td>
                                <td>
                                        Essay
                                </td>
                                <td>
                                    <?php echo $essay['exam_description'] ?>
                                </td>
                                <td>
                                    <?php 
                                        echo $essay['exam_attempt'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($essay['stud_exam_status'] == 0) {
                                    ?>
                                            <h5><span class="badge badge-secondary">Not yet started</span></h5>
                                    <?php
                                        }
                                        elseif($essay['stud_exam_status'] == 1) {
                                    ?>
                                            <h5><span class="badge badge-warning">Ongoing</span></h5>
                                    <?php
                                        }
                                        elseif($essay['stud_exam_status'] == 2) { 
                                    ?>
                                            <h5><span class="badge badge-success">Completed</span></h5>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($essay['exam_score'] > 0) {
                                            echo $score = $essay['exam_score'];
                                            if(($essay['score_status'] == 'Failed')) {
                                    ?>
                                                <h5><span class="badge badge-danger">Failed</span></h5>
                                    <?php
                                            }
                                            elseif($essay['score_status'] == 'Satisfactory') {
                                    ?>
                                                <h5><span class="badge badge-info">Satisfactory</span></h5>
                                    <?php
                                            }
                                            elseif($essay['score_status'] == 'Passed') { 
                                    ?>
                                                <h5><span class="badge badge-primary">Passed</span></h5>
                                    <?php
                                            }
                                            elseif($essay['score_status'] == 'Outstanding') { 
                                    ?>
                                                <h5><span class="badge badge-success">Outstanding</span></h5>
                                    <?php
                                            }
                                        }
                                        elseif ($essay['exam_score'] == 0 && $essay['stud_exam_status'] != 2) {
                                    ?>
                                        <h5><span class="badge badge-default">Exam not started</span></h5>
                                    <?php
                                        }
                                        else {
                                    ?>
                                        <h5><span class="badge badge-info">Waiting for final grade</span></h5>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        //Completed the exam
                                        if ($essay['stud_exam_status'] != 2) {
                                    ?>
                                        <a class="btn btn-success" href="take_exam.php?exam_id=<?php echo $essay['exam_id']?>&program_name=<?php echo $essay['program_name']?>&exam_cat=<?php echo $essay['exam_category_id']?>&student_id=<?php echo $essay['student_id']?>">Take Exam</a>
                                    <?php
                                        }
                                    ?>
                                    <a class="btn btn-primary" href="view_exam_details.php?program_id=<?php echo $essay['program_id']?>&student_id=<?php echo $essay['student_id']?>&exam_cat=<?php echo $essay['exam_category_id']?>">View Exam</a>
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