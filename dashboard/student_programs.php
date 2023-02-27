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
    <h1 class="h3 mb-2 text-gray-800">My Programs</h1>
    <p class="mb-4">Displays list of student's programs.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a class="btn btn-primary" href="enroll_program.php?action=add">Enroll a Program</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Exam Category</th>
                            <th>Programs</th>
                            <th width="75%">Short Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Exam Category</th>
                            <th>Programs</th>
                            <th width="75%">Short Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $get_profile_info =  $student->get_student_info($_SESSION['email_address']);
                            //get program list by member_id
                            $get_program_list =  $student->get_all_program_list($get_profile_info['id']);
                            foreach($get_program_list as $programs) {
                        ?>
                            <tr>
                                <td>
                                    <?php 
                                        if ($programs['exam_category_id'] == '2') {
                                            echo 'Multiple Choice';
                                        }
                                        else {
                                            echo 'Essay';
                                        }
                                    ?>
                                </td>
                                <td><?php echo $programs['program_name'] ?></td>
                                <td><?php echo $programs['short_desc'] ?></td>
                                <td>
                                    <li class="list-inline-item">
                                        <a class="btn btn-primary btn-sm rounded-0" href="enroll_program.php?action=view_program&id=<?php echo $programs['program_id']?>&program_name=<?php echo $programs['program_name']?>"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-danger btn-sm rounded-0" href="student/enroll_program.php?id=<?php echo $programs['student_id']?>"><i class="fa fa-trash"></i> Unenroll Program</a>
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
    

             