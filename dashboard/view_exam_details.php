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
                                                $score = $get_exam_details['exam_score'];
                                                if($score >= 25 && $score < 60) {
                                            ?>
                                                <h5><span class="badge badge-danger">Failed</span></h5>
                                            <?php
                                                }
                                                elseif($score >= 60 && $score < 80) {
                                            ?>
                                                <h5><span class="badge badge-info">Satisfactory</span></h5>
                                            <?php
                                                }
                                                elseif($score >= 80 && $score < 95) { 
                                            ?>
                                                <h5><span class="badge badge-primary">Passed</span></h5>
                                            <?php
                                                }
                                                elseif($score >= 95 && $score <= 100) { 
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
                </div>
            </div>
        </div>
    </div>
<?php
    include_once('db_footer.php');
?>
    

             