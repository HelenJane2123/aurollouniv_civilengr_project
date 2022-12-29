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
    <h1 class="h3 mb-2 text-gray-800">Survey</h1>
    <p class="mb-4">List of Surveys.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a class="btn btn-primary" href="add_edit_survey.php?action=add">Add New Survey</a>
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
                            <th>Survey Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Survey Title</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $get_survey_list =  $admin->get_all_survey_list($get_profile_info['member_id']);
                            foreach($get_survey_list as $survey) {
                        ?>
                            <tr>
                                <td><?php echo $survey['survey_title']; ?></td>
                                <td>
                                    <li class="list-inline-item">
                                        <a class="btn btn-warning" href="add_edit_survey.php?action=view&id=<?php echo $survey['survey_id']?>"><i class="fa fa-eye"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-primary" href="add_edit_survey.php?action=edit&id=<?php echo $survey['survey_id']?>"><i class="fa fa-pen"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-danger" href="admin/survey.php?action=delete&id=<?php echo $survey['survey_id']?>"><i class="fa fa-trash"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-info" href="survey_result.php?action=show_result&id=<?php echo $survey['survey_id']?>"><i class="fa fa-list"></i> Show Result</a>
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