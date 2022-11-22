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
                                                $get_program =  $admin->get_all_program_list($get_profile_info['member_id']);
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
                                            <input type="number" class="form-control" name="duration" placeholder="Enter exam duration">
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
                                    <div class="question_form">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="exam_id" value="<?php echo $_GET['id']?>">
                                            <label for="first" class="text-bold">Enter Question</label>
                                            <input type="text" class="form-control" name="question[]">
                                        </div>
                                        <div class="form-group">
                                            <label for="first" class="text-bold">Enter Choices</label>
                                            <input type="text" class="form-control" name="option_1[]" value="Enter Choice 1">
                                            <input type="text" class="form-control" name="option_2[]" value="Enter Choice 2">
                                            <input type="text" class="form-control" name="option_3[]" value="Enter Choice 3">
                                            <input type="text" class="form-control" name="option_4[]" value="Enter Choice 4">
                                        </div>
                                        <div class="form-group">
                                            <label for="first" class="text-bold">Correct Answer</label>
                                            <input type="text" class="form-control" name="correct_answer[]">
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
                                <li class="breadcrumb-item"><a href="admin_exam.php">Exams</a></li>
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
                                        <input class="btn btn-primary pull-right" type="Submit" name="save_essay_question" value="Save Essay Question">
                                    </div>
                                </div>
                            </div>
                        </form>
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
    

             