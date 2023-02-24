<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <?php if (isset($_SESSION['message_success'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['message_success']; 
                unset($_SESSION['message_success']);
            ?>
        </div>
    <?php endif ?>
    <h1 class="h3 mb-2 text-gray-800">List of Users</h1>
    <p class="mb-4">Displays list of users who are already registered and requesting to register.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a class="btn btn-primary" href="add_edit_user.php?action=add">Register a new User</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Member ID</th>
                            <th>Email Address</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Age</th>
                            <th>Birthday</th>
                            <th>User Type</th>
                            <th>Is Approved?</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Member ID</th>
                            <th>Email Address</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Age</th>
                            <th>Birthday</th>
                            <th>User Type</th>
                            <th>Is Approved?</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $get_users_list =  $admin->get_all_users_list();
                            foreach($get_users_list as $users) {
                        ?>
                            <tr>
                                <td><?php echo $users['member_id'] ?></td>
                                <td><?php echo $users['email_address'] ?></td>
                                <td><?php echo $users['firstname'].' '.$users['last_name'] ?></td>
                                <td><?php echo $users['phone_number'] ?></td>
                                <td><?php echo $users['age'] ?></td>
                                <td><?php echo $users['birthday'] ?></td>
                                <td><?php echo $users['user_type'] ?></td>
                                <td>
                                    <?php 
                                        if ($users['is_approved'] == 0) {
                                    ?>
                                        <h5><span class="badge badge-secondary">No</span></h5>
                                    <?php
                                        }
                                        else {
                                    ?>
                                        <h5><span class="badge badge-success">Yes</span></h5>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <li class="list-inline-item">
                                        <a class="btn btn-primary btn-sm rounded-0" href="user_profile.php?action=view_profiles&id=<?php echo $users['id']?>"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-info btn-sm rounded-0" href="admin/profile_update.php?id=<?php echo $users['id']?>"><i class="fa fa-check"></i> Approve Registration</a>
                                    </li>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
    include_once('db_footer.php');
?>