<?php
    include_once('db_header.php');
    require_once ('../model/Admin.php');
    $admin = new Admin();
?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <?php 
                    $get_profile_info =  $admin->get_admin_info($_SESSION['email_address']);
                ?>
                    <div class="col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent text-center">
                                <img class="profile_img" src="https://placeimg.com/640/480/arch/any" alt="">
                                <h3><?php echo $get_profile_info['fullname'];?></h3>
                            </div>
                            <div class="card-body">
                                <p class="mb-0"><strong class="pr-1">Member ID:</strong><?php echo $get_profile_info['member_id'];?></p>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#update_profile">Update Profile</button>
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
                                        <td><?php echo $get_profile_info['firstname'];?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Last Name</th>
                                        <td width="2%">:</td>
                                        <td><?php echo $get_profile_info['last_name'];?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Gender</th>
                                        <td width="2%">:</td>
                                        <td><?php echo !empty($get_profile_info['gender']);?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Age</th>
                                        <td width="2%">:</td>
                                        <td><?php echo !empty($get_profile_info['age']);?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Birthday</th>
                                        <td width="2%">:</td>
                                        <td><?php echo !empty($get_profile_info['birthday']);?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Religion</th>
                                        <td width="2%">:</td>
                                        <td><?php echo !empty($get_profile_info['religion']);?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">blood</th>
                                        <td width="2%">:</td>
                                        <td><?php echo !empty($get_profile_info['blood_type']);?></td>
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
                                        <td><?php echo !empty($get_profile_info['academic_year']);?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Teaching Class</th>
                                        <td width="2%">:</td>
                                        <td><?php echo !empty($get_profile_info['teaching_class']);?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Section</th>
                                        <td width="2%">:</td>
                                        <td><?php echo !empty($get_profile_info['section']);?></td>
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
    

             