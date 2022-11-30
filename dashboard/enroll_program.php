<?php
    include_once('db_header.php');
?>
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        if ($_GET['action'] == 'add') {
                    ?>
                        <!-- Page Heading -->
                        <?php if (isset($_SESSION['message_error'])): ?>
                            <div class="msg_error">
                                <?php 
                                    echo $_SESSION['message_error']; 
                                    unset($_SESSION['message_error']);
                                ?>
                            </div>
                        <?php endif ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_exam.php">Programs</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Enroll Program</li>
                            </ol>
                        </nav>
                        <form action="student/enroll_program.php?q=enroll_program" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i> Enroll a Program</h3>
                                    <?php 
                                        $get_profile_info =  $student->get_student_info($_SESSION['email_address']);
                                    ?>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Program</label>
                                        <input type="hidden" class="form-control" name="account_id" value="<?php echo $get_profile_info['id'];?>">
                                        <input type="hidden" class="form-control" name="stud_member_id" value="<?php echo $get_profile_info['member_id'];?>">
                                        <select name="program_id" class="form-control" class="exam_cat">
                                            <option value="">Select Program</option>
                                            <?php 
                                                $get_program =  $student->get_all_programs();
                                                foreach($get_program as $program) {
                                            ?>
                                                <option value="<?php echo $program['program_id']?>"><?php echo $program['program_name']?></option>
                                            <?php 
                                                } 
                                            ?>                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <input class="btn btn-primary pull-right" type="Submit" name="enroll_program" value="Enroll">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                        }
                        elseif ($_GET['action'] == 'view_program') {
                            $get_program =  $student->get_program_details_by_id($_GET['id']);
                    ?>  
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="student_programs.php">My Programs/Lessons</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Program</li>
                            </ol>
                        </nav>
                        <h1 class="h3 mb-4 text-gray-800">View Program Details for <?php echo $_GET['program_name'];?></h1>
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent border-0">
                            </div>
                            <div class="card-body pt-0">
                                <div class="form-group">
                                    <label for="first" class="text-bold">Program/Lesson</label>
                                    <input type="text" class="form-control" name="program_name" disabled value="<?php echo $get_program['program_name'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="first" class="text-bold">Description</label>
                                    <?php echo $get_program['short_desc'];?>
                                </div>
                                <div class="form-group">
                                    <label for="first" class="text-bold">With Exam?</label>
                                    <?php
                                        if ($get_program['with_exam'] == '1') {
                                    ?>
                                        <input type="text" class="form-control" name="program_name" disabled value="Yes">
                                    <?php
                                        }
                                        else {
                                    ?>
                                        <input type="text" class="form-control" name="program_name" disabled value="No">
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="card-header bg-transparent border-0">
                                <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Upload Files Here</h3>
                            </div>
                            <div class="card-body pt-0">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Lessons
                                            <br/>
                                            <small>* List of all uploaded lessons</small>
                                        </th>
                                        <td width="2%">:</td>
                                        <td>
                                            <a href="uploads/programs/<?php echo $get_program['member_id']; ?>/<?php echo $get_program['member_id']; ?>_<?php echo $get_program['program_uploaded_files']; ?>" download>
                                                <?php echo $get_program['program_uploaded_files']; ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Program Image
                                            <br/>
                                            <small>*Uploaded image will be displayed under Programs page</small>
                                        </th>
                                        <td width="2%">:</td>
                                        <td>
                                            <img src="uploads/program_images/<?php echo $get_program['member_id']; ?>/<?php echo $get_program['member_id']; ?>_<?php echo $get_program['upload_image']; ?>" style="height:200px;">
                                        </td>
                                    </tr>
                                </table>
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
    

             