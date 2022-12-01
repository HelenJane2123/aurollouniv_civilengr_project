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
                            if (isset($_GET['question_no'])) {
                                $number = (int) $_GET['question_no'];
                            }
                            else{
                                header("Location:take_exam.php");
                            }
                            $question = $student->getQuesByNumber($number,$_GET['exam_id']);
                            $get_exam_details = $student->get_my_exam_details($_GET['exam_id']);
                            
                            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $process = $student->processData($_POST);
                            }
                        
                    ?>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h1 class="h3 mb-2 text-gray-800">Welcome to Online Exam for <?php echo $_GET['program_name']?></h1>
                                <div class="text-center">
                                    <h3>Question <?php echo $question['question_no']; ?> of <?php echo $get_exam_details['total_questions']; ?></h3>
                                    <form method="POST" action="">
                                        <table  class="table"> 
                                            <tr>
                                                <td colspan="2">
                                                    <input type="hidden" name="question_id" value="<?php echo $number?>">
                                                    <input type="hidden" name="program_name" value="<?php echo $_GET['program_name']?>">
                                                    <input type="hidden" name="exam_cat" value="<?php echo $_GET['exam_cat']?>">
                                                    <input type="hidden" name="exam_id" value="<?php echo $_GET['exam_id']?>">
                                                    <input type="hidden" name="student_id" value="<?php echo $_GET['student_id']?>">
                                                    <input type="hidden" name="exam_details_id" value="<?php echo $_GET['exam_details_id']?>">

                                                    <h3>Question <?php echo $question['question_no']; ?>: <?php echo $question['question']; ?></h3>
                                                </td>
                                            </tr>
                                            <?php
                                                $answer = $student->getAnswer($number,$_GET['exam_id']);
                                                if ($answer) {
                                                    while ($result = $answer->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <input type="radio" name="ans" value="<?php echo $result['exam_details_ans_id']; ?>" /> <?php echo $result['answers']; ?>
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
                                                </td>
                                            </tr>
                                        </table>
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