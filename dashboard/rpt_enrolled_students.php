<?php
    include_once('db_header.php');
?>
    <h1 class="h3 mb-2 text-gray-800">List of Enrolled Students</h1>
    <p class="mb-4">Displays list of enrolled students.</p>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered rpt_enrolled_students" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Student Member ID</th>
                            <th>Course</th>
                            <th>Year</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Student Name</th>
                            <th>Student Member ID</th>
                            <th>Course</th>
                            <th>Year</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $get_profile_info =  $admin->get_admin_info($_SESSION['email_address']);
                            $get_students_list =  $admin->get_all_students_list_dtls();
                            foreach($get_students_list as $students) {
                        ?>
                            <tr>
                                <td><?php echo $students['firstname'].' '.$students['last_name'] ?></td>
                                <td><?php echo $students['member_id'] ?></td>
                                <td><?php echo $students['course'] ?></td>
                                <td><?php echo $students['academic_year'] ?></td>
                               
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