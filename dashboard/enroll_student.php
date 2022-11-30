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
                                <li class="breadcrumb-item"><a href="admin_exam.php">Students</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Enroll Students</li>
                            </ol>
                        </nav>
                        <form action="admin/enroll_student.php?q=addexam" method="post" enctype='multipart/form-data'>
                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i> Enroll a Student</h3>
                                    <?php 
                                        $get_profile_info =  $admin->get_admin_info($_SESSION['email_address']);
                                    ?>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Program</label>
                                        <input type="hidden" class="form-control" name="prof_member_id" value="<?php echo $get_profile_info['member_id'];?>">
                                        <select name="program_id" class="form-control" class="exam_cat">
                                            <option value="">Select Program</option>
                                            <?php 
                                                $get_program =  $admin->get_all_program_list($get_profile_info['member_id']);
                                                foreach($get_program as $program) {
                                            ?>
                                                <option value="<?php echo $program['program_id']?>"><?php echo $program['program_name']?></option>
                                            <?php 
                                                } 
                                            ?>                                        
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="first" class="text-bold">Students</label>
                                        <select name="student_id" class="form-control" class="exam_cat">
                                            <option value="">Select a Student</option>
                                            <?php 
                                                $get_students =  $admin->get_all_students();
                                                foreach($get_students as $student) {
                                            ?>
                                                <option value="<?php echo $student['id']?>"><?php echo $student['member_id'].' - '.$student['firstname'].' '.$student['last_name']?></option>
                                            <?php 
                                                } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <input class="btn btn-primary pull-right" type="Submit" name="enroll_student" value="Enroll">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                        }
                        elseif ($_GET['action'] == 'view_student') {
                            $get_student_profile =  $admin->get_student_details($_GET['id']);
                    ?>  
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_students.php">Students</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Student Profile</li>
                            </ol>
                        </nav>
                        <div class="student-profile py-4">
                            <div class="container">
                                <div class="row">
                                <div class="col-lg-4">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-transparent text-center">
                                            <img class="profile_img" src="https://placeimg.com/640/480/arch/any" alt="">
                                            <h3>John Doe</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0"><strong class="pr-1">Member ID:</strong><?php echo $get_student_profile['student_member_id']?></p>
                                            <p class="mb-0"><strong class="pr-1">Class:</strong><?php echo $get_student_profile['class']?></p>
                                            <p class="mb-0"><strong class="pr-1">Section:</strong><?php echo $get_student_profile['section']?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                        <div class="card shadow-sm">
                                            <div class="card-header bg-transparent border-0">
                                                <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                                            </div>
                                            <div class="card-body pt-0">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th width="30%">First Name</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_student_profile['firstname']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Last Name</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_student_profile['last_name']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Gender</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_student_profile['gender']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Age</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_student_profile['age']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Birthday</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_student_profile['birthday']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Religion</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_student_profile['religion']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">blood</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_student_profile['blood_type']?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="card-header bg-transparent border-0">
                                                <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Secondary Information</h3>
                                            </div>
                                            <div class="card-body pt-0">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th width="30%">Academic Year</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_student_profile['academic_year']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Course</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_student_profile['course']?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="card-header bg-transparent border-0">
                                                <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Enrolled Program</h3>
                                            </div>
                                            <div class="card-body pt-0">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th width="30%">Program Name</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_student_profile['program_name']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Download Program</th>
                                                        <td width="2%">:</td>
                                                        <td>
                                                                <a href="uploads/programs/<?php echo $get_student_profile['member_id']; ?>/<?php echo $get_profile_info_by_id['member_id']; ?>_<?php echo $get_profile_info_by_id['program_uploaded_files']; ?>" download>
                                                                <?php echo $get_student_profile['program_uploaded_files']; ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        if($get_student_profile['with_exam'] != 0) {
                                                    ?>
                                                        <tr>
                                                            <th width="30%">With Exam</th>
                                                            <td width="2%">:</td>
                                                            <td>Yes</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Exam Status</th>
                                                            <td width="2%">:</td>
                                                            <td>
                                                                <?php
                                                                    if($get_student_profile['exam_status'] == 0) {
                                                                ?>
                                                                    <span class="badge badge-secondary">Not yet Started</span>
                                                                <?php
                                                                    }
                                                                    else if($get_student_profile['exam_status'] == '1') {
                                                                ?>
                                                                    <span class="badge badge-success">Started</span>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </td>
                                                        </tr> 
                                                        <tr>
                                                            <th width="30%">Exam Score</th>
                                                            <td width="2%">:</td>
                                                            <td><?php echo $get_student_profile['exam_score']?></td>
                                                        </tr>                                                    
                                                    <?php
                                                        }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
    

             