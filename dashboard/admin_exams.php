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
    <h1 class="h3 mb-2 text-gray-800">List of Exams</h1>
    <p class="mb-4">Displays list of student's exams and ongoing exams.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a class="btn btn-primary" href="add_edit_exams.php?action=add">Add Exam</a>
                <?php 
                    $get_profile_info =  $admin->get_admin_info($_SESSION['email_address']);
                ?>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Exam</th>
                            <th>Program</th>
                            <th>Students who take the exam</th>
                            <th>Status</th>
                            <th>Total Questions</th>
                            <th>Questions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Exam</th>
                            <th>Program</th>
                            <th>Students who take the exam</th>
                            <th>Status</th>
                            <th>Total Questions</th>
                            <th>Questions</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            //get program list by member_id
                            $get_exams_list =  $admin->get_all_exams_list($get_profile_info['member_id']);
                            foreach($get_exams_list as $exams) {
                        ?>
                        <tr>
                            <td>
                                <?php
                                    if($exams['exam_category_id'] == '1') {
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
                            <td><?php echo $exams['program_name'] ?></td>
                            <td>
                                <h5><span class="badge badge-secondary"><?php echo $admin->get_all_students_not_started($exams['program_id']) ?> Not yet started</span></h5>
                                <h5><span class="badge badge-warning"><?php echo $admin->get_all_students_ongoing($exams['program_id']) ?> Ongoing</span></h5>
                                <h5><span class="badge badge-success"><?php echo $admin->get_all_students_completed($exams['program_id']) ?> Completed</span></h5>
                            </td>
                            <td><?php echo $exams['exam_status'] ?></td>
                            <td>
                                <?php
                                    if($exams['exam_category_id'] == '1') {
                                        echo $admin->get_all_essays_by_exam_id($exams['exam_id']); 
                                    }
                                    else {
                                        echo $admin->get_all_questions_by_exam_id($exams['exam_id']); 
                                    }
                                ?>
                            </td>                            
                            <td>
                                <?php
                                    if($admin->get_all_essays_by_exam_id($exams['exam_id']) == 0) {
                                ?>
                                    <a class="btn btn-warning" href="add_edit_exams.php?action=edit_<?php echo $exams['exam_category_id']?>&program_id=<?php echo $exams['program_id']?>&program_name=<?php echo $exams['program_name']?>&id=<?php echo $exams['exam_id']?>&total_questions=<?php echo $exams['total_questions']?>&memberid=<?php echo $exams['member_id']?>"><i class="fa fa-plus"></i> Add Question</a>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($admin->get_all_questions_by_exam_id($exams['exam_id']) > 0 || $admin->get_all_essays_by_exam_id($exams['exam_id']) > 0) {
                                ?>
                                    <a class="btn btn-primary" href="add_edit_exams.php?action=view_<?php echo $exams['exam_category_id']?>&program_id=<?php echo $exams['program_id']?>&program_name=<?php echo $exams['program_name']?>&id=<?php echo $exams['exam_id']?>&total_questions=<?php echo $exams['total_questions']?>&memberid=<?php echo $exams['member_id']?>"><i class="fa fa-eye"></i> View Question</a>
                                <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <li class="list-inline-item">
                                    <a class="btn btn-primary" href="add_edit_exams.php?action=view_students&id=<?php echo $exams['exam_id']?>&program_name=<?php echo $exams['program_name']?>&program_id=<?php echo $exams['program_id']?>" title="View Students"><i class="fa fa-eye"></i> View Students</a>
                                    <a class="btn btn-danger" href="admin/exam.php?id=<?php echo $exams['exam_id']?>" title="Delete this exam"><i class="fa fa-trash"></i></a>
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