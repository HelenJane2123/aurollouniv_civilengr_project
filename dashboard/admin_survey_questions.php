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
    <h1 class="h3 mb-2 text-gray-800">List of Survey Questions</h1>
    <p class="mb-4">Displays list of Survey Questions</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a class="btn btn-primary" href="add_edit_survey_questions.php?action=add">Add Survey Questions</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Survey Title</th>
                            <th>Survey Question</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Survey Title</th>
                            <th>Survey Question</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $get_profile_info =  $admin->get_admin_info($_SESSION['email_address']);
                            $get_survey_questions =  $admin->get_survey_list_by_member_id($get_profile_info['member_id']);
                            foreach($get_survey_questions as $survey_questions) {
                        ?>
                            <tr>
                                <td><?php echo $survey_questions['survey_title'] ?></td>
                                <td><?php echo $survey_questions['survey_questions'] ?></td>
                                <td>
                                    <li class="list-inline-item">
                                        <a class="btn btn-warning" href="add_edit_survey_questions.php?action=edit&id=<?php echo $survey_questions['survey_questions_id']?>&survey_questions=<?php echo $survey_questions['survey_questions']?>"><i class="fa fa-pen"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-danger" href="admin/survey.php?action=delete_survey_question&id=<?php echo $survey_questions['survey_questions_id']?>"><i class="fa fa-trash"></i></a>
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