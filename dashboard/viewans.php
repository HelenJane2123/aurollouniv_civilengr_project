<?php
    include_once('db_header.php');
?>
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        //Multiple Choice
                        if($_GET['exam_cat'] == '2') {
                            $get_exam_details = $student->get_my_exam_id($_GET['exam_id']);
                            $get_retakes = $student->get_student_retake($_GET['student_id']);
                    ?>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h1 class="h3 mb-2 text-gray-800">You are done taking Exam for <?php echo $_GET['program_name']?></h1>
                                <div class="view_answers">
                                    <h3>Total Questions and the correct answers: <?php echo $get_exam_details['total_questions']?></h3>
                                    <form method="POST" action="student/exam_submitted.php">
                                        <div class="viewans">
                                            <table class="table"> 
                                                <?php 
                                                    $getQues = $student->getQueByOrder($_GET['exam_id']);
                                                    if ($getQues) {
                                                        while ($question = $getQues->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td colspan="2">
                                                        <h3>Question <?php echo $question['question_no']; ?>: <?php echo $question['question']; ?></h3>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        $number = $question['question_no'];
                                                        $answer = $student->getAnswer($number,$_GET['exam_id']);
                                                        if ($answer) {
                                                            while ($result = $answer->fetch_assoc()) {
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <input type="radio" value=""/>
                                                                <?php 
                                                                    if ($result['correct_answer'] == '1') {
                                                                        echo "<span style='color:blue'>".$result['answers']."</span>"; 
                                                                    }
                                                                    else {
                                                                        echo $result['answers']; 
                                                                    }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php 
                                                            }
                                                        } 
                                                    ?>
                                                <?php 
                                                        }
                                                    } 
                                                ?>
                                            </table>
                                            <?php
                                                //score computation
                                                $get_my_score = $student->get_student_score($_GET['exam_id'],$_GET['student_id']);
                                                $score = ($get_my_score/$get_exam_details['total_questions']) * 100;
                                                $score_status = '';
                                                if($score == 0) {
                                                    $score_status = 'Failed';
                                                }
                                                elseif($score >= 25 && $score < 60) {
                                                    $score_status = 'Failed';
                                                }
                                                else if($score >= 60 && $score < 80) {
                                                    $score_status = 'Satisfactory';
                                                }
                                                else if($score >= 80 && $score < 90) {
                                                    $score_status = 'Passed';
                                                }
                                                else if($score >= 90) {
                                                    $score_status = 'Outstanding';
                                                }
                                            ?>
                                            <p class="text-center" style="font-size: 25px;">You've got a total score of <?php echo $get_my_score ?> out of <?php echo $get_exam_details['total_questions']?></p>
                                            <p class="text-center" style="font-size: 25px;">Your equivalent score is <?php echo $score?>/<?php echo $score_status?></p>
                                            <input type="hidden" name="score" value="<?php echo $score?>">
                                            <input type="hidden" name="score_status" value="<?php echo $score_status?>">
                                            <input type="hidden" name="student_id" value="<?php echo $_GET['student_id']?>">
                                            <input type="hidden" name="retakes" value="<?php echo $get_retakes?>">
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-primary pull-right" type="Submit" name="submit_exam" value="Submit this Exam">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                        //Essay
                        else {
                            $get_exam_essay = $student->get_my_exam_essay($_GET['exam_id']);
                    ?>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h1 class="h3 mb-2 text-gray-800">Welcome to Online Exam for <?php echo $_GET['program_name']?></h1>
                                <div class="text-center">
                                    <h3><?php echo $get_exam_essay['essay']; ?></h3>
                                    <form method="post" action="">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-transparent border-0">
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="exam_id" value="<?php echo $_GET['exam_id'];?>">
                                                <div class="form-group">
                                                    <textarea id="basic-example" name="essay"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input class="btn btn-primary pull-right" type="Submit" name="save_answer_essaye" value="Save Answer">
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
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