<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
<?php
    include_once('db_header.php');
?>
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        if (isset($_GET['question_no'])) {
                            $number = (int) $_GET['question_no'];
                        }
                        else{
                            header("Location:take_survey.php");
                        }
                        $question = $student->getSurveyByNumber($_GET['survey_id'],$_GET['question_no']);
                        $get_exam_details = $student->get_my_survey_details($_GET['survey_id']);

                        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $process_survey = $student->processSurveyData($_POST);
                        }
                        
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <h1 class="h3 mb-2 text-gray-800">Welcome to Online Survey for <?php echo $get_exam_details['survey_title']?></h1>
                            <div class="text-center">
                                <form method="POST" action="">
                                    <table  class="table"> 
                                        <tr>
                                            <td colspan="2">
                                                <h3>Question: <?php echo $question['survey_questions']; ?></h3>
                                            </td>
                                        </tr>
                                        <?php
                                            $answer = $student->getSurveyOptions($_GET['question_no'],$_GET['survey_id']);
                                            if ($answer) {
                                                while ($result = $answer->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="survey_questions_id[]" value="<?php echo $result['survey_questions_id']; ?>" />
                                                    <input type="hidden" name="student_id" value="<?php echo $_GET['student_id']; ?>" />
                                                    <input type="radio" name="ans[]" value="<?php echo $result['options']; ?>" /> <?php echo $result['options']; ?>
                                                </td>
                                            </tr>
                                        <?php
                                                }
                                            } 
                                        ?>
                                        <tr>
                                            <td>
                                                <input type="submit" class="btn btn-primary" name="submit" value="Next Question"/>
                                                <input type="hidden" name="number" value="<?php echo $number; ?>" />
                                                <input type="hidden" name="survey_id" value="<?php echo $_GET['survey_id']; ?>" />
                                            </td>
                                        </tr>
                                    </table>
                                </form>
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