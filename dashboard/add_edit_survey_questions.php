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
                                <li class="breadcrumb-item"><a href="admin_survey_questions.php">Survey Questions</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Survey Questions</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">Add Survey Questions</h1>
                        <form action="admin/survey.php" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Add New Survey Questions</h3>
                                    <?php 
                                        $get_profile_info =  $admin->get_admin_info($_SESSION['email_address']);
                                    ?>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Survey</label>
                                        <select name="survey_id" class="form-control" class="exam_cat">
                                            <option value="">Select Survey Title</option>
                                            <?php 
                                                $get_survey =  $admin->get_survey_by_member_id($get_profile_info['member_id']);
                                                foreach($get_survey as $survey) {
                                            ?>
                                                <option value="<?php echo $survey['survey_id']?>"><?php echo $survey['survey_title']?></option>
                                            <?php 
                                                } 
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="card shadow-sm">
                                            <div class="card-header bg-transparent border-0">
                                                <a href="javascript:void(0);" class="btn btn-primary add_survey_btn" title="Add field"><i class="fa fa-plus"></i> Add Survey Question</a>
                                            </div>
                                            <div class="card-body pt-0" id="field_wrapper_survey">
                                                <div class="question_form_survey">
                                                    <div class="form-group">
                                                        <label for="first" class="text-bold">Enter Question</label>
                                                        <input type="text" class="form-control" name="survey_question[]">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="first" class="text-bold">Enter Choices</label>
                                                        <input type="text" class="form-control" name="survey_1[]" placeholder="Enter Choice 1">
                                                        <input type="text" class="form-control" name="survey_2[]" placeholder="Enter Choice 2">
                                                        <input type="text" class="form-control" name="survey_3[]" placeholder="Enter Choice 3">
                                                        <input type="text" class="form-control" name="survey_4[]" placeholder="Enter Choice 4">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="form-group">
                                                    <input class="btn btn-primary pull-right" type="Submit" name="add_survey_questions">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php                                               
                        }
                        //View/Update Multiple Choice
                        else if($_GET['action'] == 'edit') {
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
                                <li class="breadcrumb-item"><a href="admin_survey_questions.php">Survey Questions</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Survey Questions</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">View/Update <?php echo $_GET['survey_questions']?></h1>
                        <form action="admin/survey.php" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-body pt-0" id="field_wrapper_">
                                    <?php
                                        $get_survey_details =  $admin->get_survey_questions($_GET['id']);
                                        foreach($get_survey_details as $survey_details) {
                                    ?>
                                        <div class="question_form">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="survey_questions_id" value="<?php echo $survey_details['survey_questions_id']?>">
                                                <input type="hidden" class="form-control" name="survey_id" value="<?php echo $_GET['id']?>">
                                                <label for="first" class="text-bold">Enter Survey Question</label>
                                                <input type="text" class="form-control" name="question_update[]" value="<?php echo $survey_details['survey_questions'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="first" class="text-bold">Enter Choices</label>
                                                <?php
                                                    $get_question_ans =  $admin->get_survey_options($survey_details['survey_questions_id']);
                                                    $value = 1;
                                                    foreach($get_question_ans as $question_ans) {
                                                ?>
                                                    <input type="text" class="form-control" name="survey_<?php echo $value++?>[]" value="<?php echo $question_ans['options'];?>">
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <input class="btn btn-primary pull-right" type="Submit" name="update_survey_question">
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
    

             