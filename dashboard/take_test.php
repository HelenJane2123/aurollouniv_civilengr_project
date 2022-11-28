<?php
    include_once('db_header.php');
    if (isset($_GET['question_no'])) {
        $number = (int) $_GET['question_no'];
    }
    else{
        header("Location:take_exam.php");
    }
?>
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        //Multiple Choice
                        if($_GET['exam_cat'] == '2') {
                            $question = $student->getQuesByNumber($number);
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
                                    <form method="post" action="">
                                        <table  class="table"> 
                                            <tr>
                                                <td colspan="2">
                                                    <input type="hidden" name="question_id" value="<?php echo $number?>">
                                                    <input type="hidden" name="program_name" value="<?php echo $_GET['program_name']?>">
                                                    <input type="hidden" name="exam_cat" value="<?php echo $_GET['exam_cat']?>">
                                                    <input type="hidden" name="exam_id" value="<?php echo $_GET['exam_id']?>">

                                                    <h3>Question <?php echo $question['question_no']; ?>: <?php echo $question['question']; ?></h3>
                                                </td>
                                            </tr>

                                            <?php 
                                                $answer = $student->getAnswer($number);
                                                if ($answer) {
                                                    while ($result = $answer->fetch_assoc()) {
                                            ?>

                                            <tr>
                                                <td>
                                                    <input type="radio" name="ans" value="<?php echo $result['exam_details_ans_id']; ?>" /> <?php echo $result['answers']; ?>
                                                </td>
                                            </tr>
                                        <?php }} ?>
                                            <tr>
                                                <td>
                                                    <input type="submit" name="submit" value="Next Question"/>
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
                    ?>
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