<?php
    include_once('db_header.php');
?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List of Programs</h1>
    <p class="mb-4">Displays list of student's programs.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a class="btn btn-primary" href="add_edit_programs.php">Add New Programs/Lesson</a>
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
                                <td><span class="badge badge-primary">50</span></td>
                                <td>
                                    <li class="list-inline-item">
                                        <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-table"></i></button>
                                    </li>
                                    <li class="list-inline-item">
                                        <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pen"></i></button>
                                    </li>
                                    <li class="list-inline-item">
                                        <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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
    

             