<?php
    include_once('db_header.php');
?>
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        $get_survey_details = $student->get_my_survey_details($_GET['survey_id']);
                    ?>
                    <form method="POST" action="">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h1 class="h3 mb-2 text-gray-800">Welcome to Online Survey for <?php echo $get_survey_details['survey_title']?></h1>
                                <p class="mb-4"><?php echo $get_survey_details['survey_description'] ?></p>
                                <div class="text-center">
                                    <a class="btn btn-success" href="survey.php?survey_id=<?php echo $get_survey_details['survey_id']; ?>&student_id=<?php echo $get_survey_details['student_survey_id']; ?>&question_no=<?php echo $get_survey_details['question_no']; ?>">Start the Survey</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once('db_footer.php');
?>