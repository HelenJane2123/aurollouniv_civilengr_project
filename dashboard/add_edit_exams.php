<?php
    include_once('db_header.php');
?>
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        if ($_GET['action'] == 'add') {
                    ?>
                        <!-- Page Heading -->
                        <?php if (isset($_SESSION['message_error'])): ?>
                            <div class="msg_error">
                                <?php 
                                    echo $_SESSION['message_error']; 
                                    unset($_SESSION['message_error']);
                                ?>
                            </div>
                        <?php endif ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_exam.php">Exams</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Exams</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">Add New Exam</h1>
                        <form action="admin/exam.php?q=addexam" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Add New Exam Category</h3>
                                    <?php 
                                        $get_profile_info =  $admin->get_admin_info($_SESSION['email_address']);
                                    ?>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Program</label>
                                        <select name="program_id" class="form-control" class="exam_cat">
                                            <option value="">Select Program</option>
                                            <?php 
                                                $get_program =  $admin->get_all_program_list_exam($get_profile_info['member_id']);
                                                foreach($get_program as $program) {
                                            ?>
                                                <option value="<?php echo $program['program_id']?>"><?php echo $program['program_name']?></option>
                                            <?php 
                                                } 
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="member_id" value="<?php echo $get_profile_info['member_id'];?>">
                                        <label for="first" class="text-bold">Exam Category</label>
                                        <select name="exam_category_id" class="form-control" class="exam_cat">
                                            <option value="">Select Value</option>
                                            <option value="1">Essay</option>
                                            <option value="2">Multiple Choice</option>
                                        </select>
                                    </div>
                                    <div class="1 box">
                                        <div class="form-group">
                                            <label for="exam_description" class="text-bold">Exam Description</label>
                                            <textarea id="basic-example" name="exam_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="2 box">
                                        <div class="form-group">
                                            <label for="first" class="text-bold">Exam Description</label>
                                            <textarea id="basic-example" name="exam_description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="first" class="text-bold">Duration:</label>
                                            <input type="number" class="form-control" name="duration" placeholder="Enter exam duration in minutes">
                                        </div>
                                        <div class="form-group">
                                            <label for="first" class="text-bold">Total Questions</label>
                                            <input type="number" class="form-control" name="total_questions">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary pull-right" type="Submit" name="add_exams" value="Save Exam">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                        }
                        //Essay
                        else if($_GET['action'] == 'edit_1') {
                    ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_exam.php">Exams</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Exams</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">Add Essay Question for <?php echo $_GET['program_name']?></h1>
                        <form action="admin/exam.php?q=addexam_essay" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="exam_id" value="<?php echo $_GET['id'];?>">
                                        <div class="form-group">
                                            <label for="exam_description" class="text-bold">Question</label>
                                            <textarea id="basic-example" name="exam_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary pull-right" type="Submit" name="save_essay_question" value="Save Essay Question">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                        }
                        //Mutiple Choice
                        else if($_GET['action'] == 'edit_2') {
                    ?>
                       <!-- Page Heading -->
                       <?php if (isset($_SESSION['message_error'])): ?>
                            <div class="msg_error">
                                <?php 
                                    echo $_SESSION['message_error']; 
                                    unset($_SESSION['message_error']);
                                ?>
                            </div>
                        <?php endif ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_exam_cat.php">Exams</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Exams</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">Add Multiple Choice Question for <?php echo $_GET['program_name']?></h1>
                        <form action="admin/exam.php" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <a href="javascript:void(0);" class="btn btn-primary add_button" title="Add field"><i class="fa fa-plus"></i> Add Question</a>
                                </div>
                                <div class="card-body pt-0" id="field_wrapper">
                                    <div class="question_form_">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="total_questions" id="total_questions" value="<?php echo $_GET['total_questions']?>">
                                            <input type="hidden" class="form-control" name="exam_id" value="<?php echo $_GET['id']?>">
                                            <input type="hidden" class="form-control" name="member_id" value="<?php echo $_GET['memberid']?>">
                                            <input type="hidden" class="form-control" name="program_id" value="<?php echo $_GET['program_id']?>">
                                            <label for="first" class="text-bold">Enter Question No</label>
                                            <input type="number" class="form-control" name="question_no[]">
                                            <label for="first" class="text-bold">Enter Question</label>
                                            <input type="text" class="form-control" name="question[]">
                                            <label for="first" class="text-bold">Upload Image (optional)</label>
                                            <input type="file" class="form-control" name="upload_question_image[]" id="file" accept="image/*" >
                                        </div>
                                        <div class="form-group">
                                            <label for="first" class="text-bold">Enter Choices</label>
                                            <input type="text" class="form-control" name="option_1[]" placeholder="Enter Choice 1">
                                            <input type="text" class="form-control" name="option_2[]" placeholder="Enter Choice 2">
                                            <input type="text" class="form-control" name="option_3[]" placeholder="Enter Choice 3">
                                            <input type="text" class="form-control" name="option_4[]" placeholder="Enter Choice 4">
                                        </div>
                                        <div class="form-group">
                                            <label for="first" class="text-bold">Correct Answer <small>Note: Enter the correct answer based on the choices from 1-4</small></label>
                                            <input type="number" class="form-control" name="correct_answer[]" placeholder="Enter the correct answer">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <input class="btn btn-primary pull-right" type="Submit" name="add_exam_question">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                        }
                        //View Essay
                        else if($_GET['action'] == 'view_1') {
                            $get_exam_by_id =  $admin->get_all_essays_exam($_GET['id']);

                    ?>
                       <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_exams.php">Exams</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Exams</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">View/Update Essay Question for <?php echo $_GET['program_name']?></h1>
                        <form action="admin/exam.php?q=addexam_essay" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="exam_id" value="<?php echo $_GET['id'];?>">
                                        <div class="form-group">
                                            <label for="exam_description" class="text-bold">Question</label>
                                            <textarea id="basic-example" name="essay"><?php echo $get_exam_by_id['essay']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary pull-right" type="Submit" name="save_update_essay_question" value="Save Essay Question">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                        }
                        //View/Update Multiple Choice
                        else if($_GET['action'] == 'view_2') {
                    ?>
                        <!-- Page Heading -->
                       <?php if (isset($_SESSION['message_error'])): ?>
                            <div class="msg_error">
                                <?php 
                                    echo $_SESSION['message_error']; 
                                    unset($_SESSION['message_error']);
                                ?>
                            </div>
                        <?php endif ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_exams.php">Exams</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Exams</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">View/Update Multiple Choice Question for <?php echo $_GET['program_name']?></h1>
                        <form action="admin/exam.php" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <a href="javascript:void(0);" class="btn btn-primary add_button_update" title="Add field"><i class="fa fa-plus"></i> Add Question</a>
                                </div>
                                <div class="card-body pt-0" id="field_wrapper_">
                                    <?php
                                        $get_exam_details =  $admin->getQueByOrder_exam_details($_GET['id']);
                                        foreach($get_exam_details as $exam_details) {
                                    ?>
                                        <div class="question_form">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="total_questions_update" id="total_questions" value="<?php echo $_GET['total_questions']?>">
                                                <input type="hidden" class="form-control" name="exam_id" value="<?php echo $_GET['id']?>">
                                                <input type="hidden" class="form-control" name="exam_details_id[]" value="<?php echo $exam_details['exam_details_id']?>">
                                                <input type="hidden" class="form-control" name="member_id" value="<?php echo $_GET['memberid']?>">
                                                <label for="first" class="text-bold">Enter Question No</label>
                                                <input type="number" class="form-control" name="question_no_update[]" value="<?php echo $exam_details['question_no'];?>">
                                                <label for="first" class="text-bold">Enter Question</label>
                                                <input type="text" class="form-control" name="question_update[]" value="<?php echo $exam_details['question'];?>">
                                                <label for="first" class="text-bold">Upload Image (optional)</label>
                                                <img src="uploads/questions/<?php echo $_GET['id']; ?>/<?php echo $_GET['program_id']; ?>/<?php echo $_GET['memberid']; ?>/<?php echo $exam_details['question_no'];?>/<?php echo $exam_details['question_image']; ?>" style="height:200px;">
                                                <input type="file" class="form-control" name="upload_question_image_update[]" id="file" accept="image/*" >
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="first" class="text-bold">Enter Choices</label>
                                                <?php
                                                    $number = $exam_details['question_no'];
                                                    $get_question_ans =  $admin->getQueByOrder_exam_details_answer($exam_details['question_no'],$exam_details['exam_details_id']);
                                                    $value = 1;
                                                    foreach($get_question_ans as $question_ans) {
                                                ?>
                                                    <input type="text" class="form-control" name="option_<?php echo $value++?>_update[]" value="<?php echo $question_ans['answers'];?>">
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="first" class="text-bold">Correct Answer <small>Note: Enter the correct answer based on the choices from 1-4</small></label>
                                                <?php
                                                    $get_correct_ans = $admin->getQueByOrder_correct_answer($exam_details['question_no'],$exam_details['exam_details_id']);
                                                    $ans = array();
                                                    $count = 1;
                                                    $column_answer = 0;
                                                    foreach($get_question_ans as $key => $question_ans) {
                                                        if ($question_ans['correct_answer']  == '1') {
                                                            $column_answer = $key+$count;
                                                       
                                                ?>
                                                    <input type="text" class="form-control" name="correct_answer_update[]" value="<?php echo $column_answer;?>">
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-danger remove_button_update"><i class="fa fa-minus"></i> Remove Question</a>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <input class="btn btn-primary pull-right" type="Submit" name="update_exam_question">
                                    </div>
                                </div>
                            </div>
                        </form>
                     <?php
                        }
                        //View Students
                        else if($_GET['action'] == 'view_students') {
                            $get_exam_by_id =  $admin->get_all_essays_exam($_GET['id']);

                    ?>
                       <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_exams.php">Exams</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Students</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">View Students enrolled for <?php echo $_GET['program_name'] ?></h1>
                        <div class="card shadow-sm">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Students Name</th>
                                            <th>Student Member ID</th>
                                            <th>Course</th>
                                            <th>Year</th>
                                            <th>Exam Status</th>
                                            <th>Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            //get program list by program_id
                                            $get_students_list =  $admin->get_all_students_program_id($_GET['program_id']);
                                            foreach($get_students_list as $students) {
                                        ?>
                                            <tr>
                                                <td><?php echo $students['firstname'].' '.$students['last_name'] ?></td>
                                                <td><?php echo $students['student_member_id'] ?></td>
                                                <td><?php echo $students['course'] ?></td>
                                                <td><?php echo $students['academic_year'] ?></td>
                                                <td>
                                                    <?php
                                                        if($students['stud_exam_status'] == 0) {
                                                    ?>
                                                        <h5><span class="badge badge-secondary">Not yet started</span></h5>
                                                    <?php
                                                        }
                                                        elseif($students['stud_exam_status'] == 1) {
                                                    ?>
                                                        <h5><span class="badge badge-warning">Ongoing</span></h5>
                                                    <?php
                                                        }
                                                        elseif($students['stud_exam_status'] == 2) { 
                                                    ?>
                                                        <h5><span class="badge badge-success">Completed</span></h5>
                                                    <?php
                                                        }
                                                    ?>
                                                </td>
                                                <td><span class="badge badge-secondary"><?php echo $students['exam_score'] ?></span></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once('db_footer.php');
?>
    

             