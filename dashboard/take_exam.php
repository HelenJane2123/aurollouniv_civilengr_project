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
                        $question = $student->getQuestion($_GET['exam_id']);
                        $get_exam_details = $student->get_my_exam_details($_GET['exam_id']);
                    ?>
                        <form method="POST" action="">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <h1 class="h3 mb-2 text-gray-800">Welcome to Online Exam for <?php echo $_GET['program_name']?></h1>
                                    <p class="mb-4"><?php echo $get_exam_details['exam_description'] ?></p>
                                    <img src="uploads/program_images/<?php echo $get_exam_details['member_id']; ?>/<?php echo $get_exam_details['member_id']; ?>_<?php echo $get_exam_details['upload_image']; ?>" style="max-height:595px;">
                                    <div class="text-center">
                                        <ul>
                                            <li style="list-style:none; font-size: 25px"><strong>Number of Questions:</strong> <?php echo $get_exam_details['total_questions'] ?></li>
                                            <li style="list-style:none; font-size: 25px"><strong>Question Type:</strong> Multiple Choice</li>
                                        </ul>
                                        <a class="btn btn-success" href="take_test.php?exam_details_id=<?php echo $get_exam_details['exam_details_id']; ?>&question_no=<?php echo $question['question_no']; ?>&program_name=<?php echo $_GET['program_name']; ?>&exam_cat=<?php echo $_GET['exam_cat']?>&exam_id=<?php echo $_GET['exam_id']?>&student_id=<?php echo $_GET['student_id']?>">Start the exam</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                        }
                        //Essay
                        else {
                            $get_exam_details = $student->get_my_exam_details($_GET['exam_id']);
                    ?>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h1 class="h3 mb-2 text-gray-800">Welcome to Online Exam for <?php echo $_GET['program_name']?></h1>
                                <p class="mb-4"><?php echo $get_exam_details['exam_description'] ?></p>
                                <img src="uploads/program_images/<?php echo $get_exam_details['member_id']; ?>/<?php echo $get_exam_details['member_id']; ?>_<?php echo $get_exam_details['upload_image']; ?>" style="height:700px;">
                                <div class="text-center">
                                    <ul>
                                        <li style="list-style:none; font-size: 25px"><strong>Question Type:</strong> Essay</li>
                                    </ul>
                                    <a class="btn btn-success" href="take_test.php?exam_details_id=<?php echo $get_exam_details['exam_details_id']; ?>&program_name=<?php echo $_GET['program_name']; ?>&exam_cat=<?php echo $_GET['exam_cat']?>&exam_id=<?php echo $_GET['exam_id']?>&student_id=<?php echo $_GET['student_id']?>">Start the exam</a>
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