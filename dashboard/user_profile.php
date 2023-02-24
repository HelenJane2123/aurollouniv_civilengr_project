<?php
    include_once('db_header.php');
?>
    <div class="user-profile py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        if ($_GET['action'] == 'view_profiles') {
                            $get_user_profile =  $admin->get_user_details($_GET['id']);
                    ?>  
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_users.php">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View User Profile</li>
                            </ol>
                        </nav>
                        <div class="student-profile py-4">
                            <div class="container">
                                <div class="row">
                                <div class="col-lg-4">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-transparent text-center">
                                            <img class="profile_img" src="https://placeimg.com/640/480/arch/any" alt="">
                                            <h3><?php echo $get_user_profile['firstname']?> <?php echo $get_user_profile['last_name']?></h3>
                                        </div>
                                        <?php
                                            if($get_user_profile['user_type'] == 'Student') {
                                        ?>
                                            <div class="card-body">
                                                <p class="mb-0"><strong class="pr-1">Member ID:</strong><?php echo $get_user_profile['member_id']?></p>
                                                <p class="mb-0"><strong class="pr-1">Class:</strong><?php echo $get_user_profile['class']?></p>
                                                <p class="mb-0"><strong class="pr-1">Section:</strong><?php echo $get_user_profile['section']?></p>
                                                <p class="mb-0"><strong class="pr-1">Course:</strong><?php echo $get_user_profile['course']?></p>
                                            </div>
                                        <?php
                                            }
                                            else {
                                        ?>
                                            <div class="card-body">
                                                <p class="mb-0"><strong class="pr-1">Member ID:</strong><?php echo $get_user_profile['member_id']?></p>
                                                <p class="mb-0"><strong class="pr-1">Teaching Class:</strong><?php echo $get_user_profile['class']?></p>
                                                <p class="mb-0"><strong class="pr-1">Course:</strong><?php echo $get_user_profile['course']?></p>
                                            </div>
                                        <?php
                                            }
                                        ?>
                                        
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
                                                        <td><?php echo $get_user_profile['firstname']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Last Name</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_user_profile['last_name']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Gender</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_user_profile['gender']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Age</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_user_profile['age']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Birthday</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_user_profile['birthday']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Religion</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_user_profile['religion']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">blood</th>
                                                        <td width="2%">:</td>
                                                        <td><?php echo $get_user_profile['blood_type']?></td>
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
                                                        <td><?php echo $get_user_profile['academic_year']?></td>
                                                    </tr>
                                                </table>
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
    

             