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
    <?php elseif (isset($_SESSION['message_error'])): ?>
        <div class="msg_error">
            <?php 
                echo $_SESSION['message_error']; 
                unset($_SESSION['message_error']);
            ?>
        </div>
    <?php 
        endif 
    ?>
    <h1 class="h3 mb-2 text-gray-800">List of Programs</h1>
    <p class="mb-4">Displays list of student's programs.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a class="btn btn-primary" href="add_edit_programs.php?action=add">Add New Programs/Lesson</a>
                <?php 
                    $get_profile_info =  $admin->get_admin_info($_SESSION['email_address']);
                ?>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Programs</th>
                            <th>Short Description</th>
                            <th>With Exam?</th>                            
                            <th>Enrolled Students</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Programs</th>
                            <th>Short Description</th>
                            <th>With Exam?</th>                            
                            <th>Enrolled Students</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            //get program list by member_id
                            $get_program_list =  $admin->get_all_program_list($get_profile_info['member_id']);
                            foreach($get_program_list as $program_list) {
                        ?>
                            <tr>
                                <td><?php echo $program_list['program_name']; ?></td>
                                <td><?php echo $program_list['short_desc']; ?></td>
                                <td>
                                    <?php 
                                        if($program_list['with_exam'] == 1) {
                                            echo 'Yes';
                                        }
                                        else {
                                            echo 'No';
                                        }
                                    ?>
                                </td>
                                <td><h5><span class="badge badge-info"><?php echo $admin->get_all_students_count_program_id($program_list['program_id']) ?></span></h5></td>
                                <td>
                                    <li class="list-inline-item">
                                        <a class="btn btn-warning" href="add_edit_programs.php?action=view&id=<?php echo $program_list['program_id']?>"><i class="fa fa-eye"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-primary" href="add_edit_programs.php?action=edit&id=<?php echo $program_list['program_id']?>"><i class="fa fa-pen"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-danger" href="admin/programs.php?action=delete&id=<?php echo $program_list['program_id']?>"><i class="fa fa-trash"></i></a>
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
    

             