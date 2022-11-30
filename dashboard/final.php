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
                                <div class="text-center">
                                    <h3>Congratulations! You have just completed the test.</h3>
                                    <h2>You've got: 
                                        <?php 
                                            if (isset($_SESSION['score'])) {
                                                echo $_SESSION['score'];
                                            }
                                        ?>
                                        out of
                                        <?php 
                                            echo $get_exam_details['total_questions'];
                                        ?>
                                    </h2>
                                    <a class="btn btn-primary" href="viewans.php?program_name=<?php echo $_GET['program_name']?>&exam_cat=<?php echo $_GET['exam_cat']?>&exam_id=<?php echo $_GET['exam_id']?>&student_id=<?php echo $_GET['student_id']?>&score=<?php echo $_SESSION['score']?>">View Answers</a>
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