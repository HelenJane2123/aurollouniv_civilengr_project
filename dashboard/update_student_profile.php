<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update My Profile</h1>
    <div class="student-profile py-4">
        <div class="container">
            <form action="student/profile_update.php" method="post">
                <div class="row">
                    <?php 
                        $get_profile_info =  $student->get_student_info($_SESSION['email_address']);
                    ?>
                    
                    <div class="col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent text-center">
                                <img class="profile_img" src="https://placeimg.com/640/480/arch/any" alt="">
                                <h3><?php echo $get_profile_info['fullname'];?></h3>
                            </div>
                            <div class="card-body">
                                <p class="mb-0"><strong class="pr-1">Member ID:</strong><?php echo $get_profile_info['member_id'];?></p>
                                <p class="mb-0"><strong class="pr-1">Class:</strong><input type="text" class="form-control" name="class" value="<?php echo $get_profile_info['class'];?>"></p>
                                <p class="mb-0"><strong class="pr-1">Section:</strong><input type="text" class="form-control" name="section" value="<?php echo $get_profile_info['section'];?>"></p>
                                <br/>
                                <a class="btn btn-primary" href="admin_profile.php">Back to  Profile</a>
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
                                        <th width="30%">Upload Profile picture
                                        </th>
                                        <td width="2%">:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="file" name="upload_image" id="file">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">First Name</th>
                                        <td width="2%">:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="member_id" value="<?php echo $get_profile_info['member_id'];?>">
                                                <input type="text" class="form-control" name="firstname" value="<?php echo $get_profile_info['firstname'];?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Last Name</th>
                                        <td width="2%">:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="last_name" value="<?php echo $get_profile_info['last_name'];?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Email Address</th>
                                        <td width="2%">:</td>
                                        <td>
                                            <div class="form-group">
                                                <input disabled type="text" class="form-control" name="email_address" value="<?php echo $get_profile_info['email_address'];?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Phone Number</th>
                                        <td width="2%">:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="phone_number" value="<?php echo !empty($get_profile_info['phone_number']) ?
                                                        $get_profile_info['phone_number'] :  '';?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Gender</th>
                                        <td width="2%">:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="gender" value="<?php echo !empty($get_profile_info['gender']) ?
                                                        $get_profile_info['gender'] :  '';?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Age</th>
                                        <td width="2%">:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="age" value="<?php echo !empty($get_profile_info['age']) ?
                                                        $get_profile_info['age'] :  '';?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Birthday</th>
                                        <td width="2%">:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="birthday" value="<?php echo !empty($get_profile_info['birthday']) ?
                                                        $get_profile_info['birthday'] :  '';?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Religion</th>
                                        <td width="2%">:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="religion" value="<?php echo !empty($get_profile_info['religion']) ?
                                                        $get_profile_info['religion'] :  '';?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Blood Type</th>
                                        <td width="2%">:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="blood_type" value="<?php echo !empty($get_profile_info['blood_type']) ?
                                                        $get_profile_info['blood_type'] :  '';?>">
                                            </div>
                                        </td>
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
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="academic_year" value="<?php echo !empty($get_profile_info['academic_year']) ?
                                                        $get_profile_info['academic_year'] :  '';?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Course</th>
                                        <td width="2%">:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="course" value="<?php echo !empty($get_profile_info['course']) ?
                                                        $get_profile_info['course'] :  '';?>">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <br/>
                        <div class="form-group">
                            <input class="btn btn-primary" type="Submit" name="update_profile">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
    include_once('db_footer.php');
?>
    

             