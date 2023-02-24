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
                            $get_exam_details = $student->get_my_exam_details($_GET['exam_id']);
                        
                    ?>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h1 class="h3 mb-2 text-gray-800">You are done taking Exam for <?php echo $_GET['program_name']?></h1>
                                <div class="main-card mb-3 text-center">
                                    <h3>Congratulations! You have just completed the test.</h3>
                                    <?php
                                        $get_my_score = $student->get_student_score($_GET['exam_id'],$_GET['student_id']);
                                    ?>
                                    <h2>You've got: 
                                        <span style="color:blue;font-weight:bold;">
                                            <?php 
                                            echo $get_my_score;
                                            ?>
                                        </span>
                                        out of
                                        <span style="color:green;font-weight:bold;">
                                            <?php 
                                                echo $get_exam_details['total_questions'];
                                            ?>
                                        </span>
                                        correct answers
                                    </h2>
                                    <a class="btn btn-primary pull-right" href="viewans.php?program_name=<?php echo $_GET['program_name']?>&exam_cat=<?php echo $_GET['exam_cat']?>&exam_id=<?php echo $_GET['exam_id']?>&student_id=<?php echo $_GET['student_id']?>">View Answers</a>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                        //Essay
                        else {
                            $get_exam_essay = $student->get_my_exam_essay($_GET['exam_id']);
                    ?>
                        <?php if (isset($_SESSION['message_error'])) { ?>
                            <div class="msg_error">
                                <?php 
                                    echo $_SESSION['message_error']; 
                                    unset($_SESSION['message_error']);
                                ?>
                            </div>
                        <?php 
                            }
                        ?>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="main-card mb-3 text-center">
                                    <h3>Congratulations! You have just completed the test.</h3>
                                    <?php
                                        $get_my_score = $student->get_student_score($_GET['exam_id'],$_GET['student_id']);
                                    ?>
                                    <h2>Wait for your Professor to grade your answer.</h2>
                                    <a class="btn btn-primary pull-right" href="student_exams.php">Back to my Exams</a>
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