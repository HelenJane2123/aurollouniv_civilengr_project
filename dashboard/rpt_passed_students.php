<?php
    include_once('db_header.php');
?>
    <h1 class="h3 mb-2 text-gray-800">List of Passed Students</h1>
    <p class="mb-4">Displays list of passed students.</p>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered rpt_passed_students" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Student Member ID</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Program ID</th>
                            <th>Program Name</th>
                            <th>Exam Score</th>
                            <th>Professor</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Student Name</th>
                            <th>Student Member ID</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Program ID</th>
                            <th>Program Name</th>
                            <th>Exam Score</th>
                            <th>Professor</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $get_failed_student_list =  $admin->get_all_failed_students();
                            foreach($get_failed_student_list as $failed_students) {
                        ?>
                            <tr>
                                <td><?php echo $failed_students['student_first_name'].' '.$failed_students['student_last_name'] ?></td>
                                <td><?php echo $failed_students['student_member_id'] ?></td>
                                <td><?php echo $failed_students['student_course'] ?></td>
                                <td><?php echo $failed_students['student_year'] ?></td>
                                <td><?php echo $failed_students['program_id'] ?></td>
                                <td><?php echo $failed_students['program_name'] ?></td>
                                <td><?php echo $failed_students['exam_score'] ?></td>
                                <td><?php echo $failed_students['prof_first_name'].' '.$failed_students['prof_last_name']  ?></td>
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