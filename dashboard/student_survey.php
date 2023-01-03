<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">My Surveys</h1>
    <p class="mb-4">Displays list of my surveys.</p>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Survey Title</th>
                            <th width="55%">Survey Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Survey Title</th>
                            <th width="55%">Survey Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $get_profile_info =  $student->get_student_info($_SESSION['email_address']);
                            $get_survey_list =  $student->get_my_survey($get_profile_info['member_id']);
                            foreach($get_survey_list as $survey_list) {
                        ?>
                            <tr>
                                <td><?php echo $survey_list['survey_title'] ?></td>
                                <td>
                                    <?php echo $survey_list['survey_description'] ?>
                                </td>
                                <td>
                                    <?php
                                        if($survey_list['survey_status'] == 0) {
                                    ?>
                                        <h5><span class="badge badge-secondary">Not yet started</span></h5>
                                    <?php
                                        }
                                        elseif($survey_list['survey_status'] == 1) { 
                                    ?>
                                        <h5><span class="badge badge-success">Completed</span></h5>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if ($survey_list['survey_status'] == 1) {
                                            $btn = 'disabled_survey_btn';
                                        }
                                    ?>
                                    <a class="btn btn-success <?php echo $btn?>" href="take_survey.php?survey_id=<?php echo $survey_list['survey_id']?>&survey_title=<?php echo $survey_list['survey_title']?>&student_survey_id=<?php echo $survey_list['student_survey_id']?>">Take the Survey</a>
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