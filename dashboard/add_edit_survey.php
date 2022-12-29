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
                                <li class="breadcrumb-item"><a href="admin_survey.php">Survey</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Survey</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">Add New Survey</h1>
                        <form action="admin/survey.php" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Add New Survey</h3>
                                    <?php 
                                        $get_profile_info =  $admin->get_admin_info($_SESSION['email_address']);
                                    ?>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="member_id" value="<?php echo $get_profile_info['member_id'];?>">
                                        <label for="first" class="text-bold">Survey Title</label>
                                        <input type="text" class="form-control" name="survey_title" placeholder="Enter Survey Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Survey Description</label>
                                        <textarea id="basic-example" name="survey_description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary pull-right" type="Submit" name="add_survey_list">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                        }
                        elseif ($_GET['action'] == 'add_survey_questions') {
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
                                <li class="breadcrumb-item"><a href="admin_survey.php">Survey</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Survey Questions</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">Add New Survey Question</h1>
                        <form action="admin/survey.php" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Add New Survey Question</h3>
                                    <?php 
                                        $get_profile_info =  $admin->get_admin_info($_SESSION['email_address']);
                                    ?>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="card shadow-sm show-survey-questions">
                                        <div class="card-header bg-transparent border-0">
                                            <a href="javascript:void(0);" class="btn btn-primary add_survey_btn" title="Add field"><i class="fa fa-plus"></i> Add Survey Question</a>
                                        </div>

                                        <div class="card-body pt-0" id="field_wrapper_survey">
                                            <div class="question_form_survey">
                                                <div class="form-group">
                                                    <label for="first" class="text-bold">Enter Survey Question</label>
                                                    <input type="text" class="form-control" name="survey_question[]">
                                                    <input type="hidden" class="form-control" name="survey_id" value="<?php echo $_GET['survey_id']?>">
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
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <input class="btn btn-primary pull-right" type="Submit" name="add_survey_questions">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                        }
                        //edit program
                        else if($_GET['action'] == 'edit') {
                            $get_survey_by_id =  $admin->get_survey_by_id($_GET['id']);
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
                                <li class="breadcrumb-item"><a href="admin_survey.php">Survey</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Survey</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">Edit Survey</h1>
                        <form action="admin/survey.php" method="post" enctype='multipart/form-data'>
                        <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Survey Title</label>
                                        <input type="text" class="form-control" name="survey_title" value="<?php echo $get_survey_by_id['survey_title'];?>">
                                        <input type="hidden" class="form-control" name="survey_id" value="<?php echo $get_survey_by_id['survey_id'];?>">
                                        <input type="hidden" class="form-control" name="member_id" value="<?php echo $get_survey_by_id['member_id'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Survey Description</label>
                                        <textarea id="basic-example" name="survey_description">
                                            <?php echo $get_survey_by_id['survey_description'];?>
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary pull-right" type="Submit" name="update_survey">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                        }
                        else if($_GET['action'] == 'view') {
                            $get_survey_by_id =  $admin->get_survey_by_id($_GET['id']);

                    ?>
                        <!-- Page Heading -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_survey.php">Survey</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Survey</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">View Survey Details for <?php echo $get_survey_by_id['survey_title'];?></h1>
                        <form action="#" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Survey Title</label>
                                        <input type="text" class="form-control" name="survey_title" disabled value="<?php echo $get_survey_by_id['survey_title'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Survey Description</label>
                                        <?php echo $get_survey_by_id['survey_description'];?>
                                    </div>
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Survey Question</label>
                                        <input type="text" class="form-control" name="survey_question" disabled value="<?php echo $get_survey_by_id['survey_question'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Options</label>
                                        <?php
                                            $get_options =  $admin->get_survey_options($_GET['id']);
                                            $value = 1;
                                            foreach($get_options as $options) {
                                        ?>
                                            <input type="text" class="form-control" disabled name="option_<?php echo $value++?>[]" value="<?php echo $options['options'];?>">
                                        <?php
                                            }
                                        ?>
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
    

             