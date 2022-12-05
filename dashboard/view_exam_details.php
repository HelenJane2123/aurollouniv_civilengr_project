<?php
    include_once('db_header.php');
?>
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        $get_exam_details =  $student->get_exam_details_by_student_id($_GET['student_id']);
                    ?>  
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="student_exams.php">My Exams</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Exam Details</li>
                        </ol>
                    </nav>
                    <h1 class="h3 mb-4 text-gray-800">View Exam Details for <?php echo $get_exam_details['program_name'];?></h1>
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                        </div>
                        <div class="card-body pt-0">
                            <div class="form-group">
                                <label for="first" class="text-bold">Program/Lesson</label>
                                <input type="text" class="form-control" name="program_name" disabled value="<?php echo $get_exam_details['program_name'];?>">
                            </div>
                            <div class="form-group">
                                <label for="first" class="text-bold">Description:</label>
                                <?php echo $get_exam_details['short_desc'];?>
                            </div>
                            <div class="form-group">
                                <label for="first" class="text-bold">Exam Type:</label>
                                <?php
                                    if($_GET['exam_cat'] == 2) {
                                        echo 'Multiple Choice';
                                    }
                                    else {
                                        echo 'Essay';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Exam Details</h3>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Exam Status
                                    </th>
                                    <td width="2%">:</td>
                                    <td>
                                        <?php
                                            if($get_exam_details['stud_exam_status'] == 0) {
                                        ?>
                                            <h5><span class="badge badge-secondary">Not yet started</span></h5>
                                        <?php
                                            }
                                            elseif($get_exam_details['stud_exam_status'] == 1) {
                                        ?>
                                            <h5><span class="badge badge-warning">Ongoing</span></h5>
                                        <?php
                                            }
                                            elseif($get_exam_details['stud_exam_status'] == 2) { 
                                        ?>
                                            <h5><span class="badge badge-success">Completed</span></h5>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="30%">Exam Score
                                    </th>
                                    <td width="2%">:</td>
                                    <td>
                                        <?php echo $get_exam_details['exam_score'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="30%">Exam Status
                                    </th>
                                    <td width="2%">:</td>
                                    <td>
                                        <?php
                                            if(($get_exam_details['score_status'] == 'Failed')) {
                                        ?>
                                                <h5><span class="badge badge-danger">Failed</span></h5>
                                        <?php
                                            }
                                            elseif($get_exam_details['score_status'] == 'Satisfactory') {
                                        ?>
                                                <h5><span class="badge badge-info">Satisfactory</span></h5>
                                        <?php
                                            }
                                            elseif($get_exam_details['score_status'] == 'Passed') { 
                                        ?>
                                                <h5><span class="badge badge-primary">Passed</span></h5>
                                        <?php
                                            }
                                            elseif($get_exam_details['score_status'] == 'Outstanding') { 
                                        ?>
                                                <h5><span class="badge badge-success">Outstanding</span></h5>
                                        <?php
                                            }
                                        ?>                                     
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br/>
                    <?php
                        //Check if there is existing exam for Essay
                        $get_exam_details =  $student->get_student_essay_exam_id($_GET['student_id'],$get_exam_details['exam_id']);
                    ?>
                    <h1 class="h3 mb-4 text-gray-800">Question Details and Answers</h1>
                    <?php
                        //Essay
                        if($_GET['exam_cat'] == '1') {
                    ?>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="essay_answer">
                                    <h3><?php echo $get_exam_details['essay']; ?></h3>
                                    <form method="post" action="">
                                        <div class="card shadow-sm">
                                            <div class="card-header bg-transparent border-0">
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="form-group">
                                                    <label for="first" class="text-bold">My Answer:</label>
                                                    <?php echo $get_exam_details['student_answer'];?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="first" class="text-bold">My Professor Remarks:</label>
                                                    <?php echo $get_exam_details['prof_comment_if_essay'];?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="first" class="text-bold">My Professor Grades:</label>
                                                    <?php echo $get_exam_details['exam_score'];?>
                                                </div>                                                    
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>                    
                    <?php
                        }
                        //multiple choice
                        else {
                    ?>
                        <table class="table"> 
                            <?php 
                                $getQues = $student->getQueByOrder($_GET['exam_id']);
                                if ($getQues) {
                                    while ($question = $getQues->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td colspan="2">
                                    <h5>Question <?php echo $question['question_no']; ?>: <?php echo $question['question']; ?></h5>
                                    </td>
                                </tr>
                                <?php 
                                    $number = $question['question_no'];
                                    $answer = $student->getStudentAnswer($number,$_GET['exam_id']);
                                    $exam_attempt = 1;
                                    if ($answer) {
                                        while ($result = $answer->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td>
                                            Answers:
                                            <?php 
                                                if ($result['correct_answer'] != $result['answer']) {
                                                    echo "<span style='color:red'>".$result['answers']."</span>"; 
                                                }
                                                else {
                                                    echo "<span class='text-success'>".$result['answers']."</span>"; 
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
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
<?php
    include_once('db_footer.php');
?>
    

             