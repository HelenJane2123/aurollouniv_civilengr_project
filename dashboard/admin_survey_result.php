<?php
    include_once('db_header.php');
?>
    <h1 class="h3 mb-2 text-gray-800">Survey Details</h1>
    <p class="mb-4">Display Survey Results</p>
    <div class="card shadow mb-4">
        <div class="card-body">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin_survey.php">Survey</a></li>
                <li class="breadcrumb-item active" aria-current="page">Survey Result</li>
            </ol>
        </nav>
        <h1 class="h3 mb-4 text-gray-800">Display Survey Result</h1>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body pt-0" id="field_wrapper_">
                            <?php
                                $get_survey =  $admin->get_my_survey($_GET['id']);
                                $ans = array();
                            ?>
                            <div class="card-body p-0 py-2">
                                <div class="container-fluid">
                                    <p>Title: <b><?php echo $get_survey['survey_title'] ?></b></p>
                                    <p class="mb-0"><?php echo $get_survey['survey_description']; ?>
                                </div>
                                <hr class="border-primary">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title"><b>Survey Report</b></h3>
                        </div>
                        <div class="card-body ui-sortable">
                            <?php
                                $get_survey_questions = $admin->get_survey_questions_by_survey_id($_GET['id']);

                                foreach($get_survey_questions as $survey_question) {
                            ?>
                                <div class="callout callout-info">
                                    <h5><?php echo $survey_question['survey_questions'] ?></h5>
                                    <?php
                                        $get_options = $admin->getSurveyOptions($survey_question['question_no'],$_GET['id']);
                                    ?>
                                    <ul>
                                        <?php
                                            if ($get_options) {
                                                while ($result = $get_options->fetch_assoc()) {
                                                    $taken = $admin->getSurveyAnswer($_GET['id'],$result['survey_questions_id']);
                                                    if($taken > 0) {
                                                        $prog = ((isset($result['survey_questions_id']) ? count((array)$result['survey_questions_id']) : 0) / $taken) * 100;
                                                        $prog = round($prog,2);
                                        ?>
                                                        <li>
                                                            <div class="d-block w-100">
                                                                <b><?php echo $result['options'] ?></b>
                                                            </div>
                                                            <div class="d-flex w-100">
                                                                <span class=""><?php echo isset($result['survey_questions_id']) ? count((array)$result['survey_questions_id']) : 0 ?>/<?php echo $taken ?></span>
                                                                <div class="mx-1 col-sm-8">
                                                                    <div class="progress w-100" >
                                                                        <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $prog ?>%">
                                                                            <span class="sr-only"><?php echo $prog ?>%</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <span class="badge badge-info"><?php echo $prog ?>%</span>
                                                            </div>
                                                        </li>
                                        <?php
                                                    }
                                                }
                                            }
                                        ?>
                                    </ul>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
<?php
    include_once('db_footer.php');
?>