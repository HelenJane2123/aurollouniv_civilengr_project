<?php
    include_once('db_header.php');
?>
    <h1 class="h3 mb-2 text-gray-800">List of Programs</h1>
    <p class="mb-4">Displays list of programs.</p>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered rpt_programs" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Program ID</th>
                            <th>Program Name</th>
                            <th>Exam Type</th>
                            <th>Student Name</th>
                            <th>Student Member ID</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Professor</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Program ID</th>
                            <th>Program Name</th>
                            <th>Exam Type</th>
                            <th>Student Name</th>
                            <th>Student Member ID</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Professor</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $get_program_list =  $admin->get_all_program_dtls();
                            foreach($get_program_list as $programs) {
                        ?>
                            <tr>
                                <td><?php echo $programs['program_id'] ?></td>
                                <td><?php echo $programs['program_name'] ?></td>
                                <td>
                                    <?php 
                                        if($programs['exam_category_id'] == '1') {
                                            echo 'Essay';
                                        }
                                        else {
                                            echo 'Multiple Choice';
                                        }
                                    ?>
                                </td>
                                <td><?php echo $programs['student_first_name'].' '.$programs['student_last_name'] ?></td>
                                <td><?php echo $programs['student_member_id'] ?></td>
                                <td><?php echo $programs['student_course'] ?></td>
                                <td><?php echo $programs['student_year'] ?></td>
                                <td><?php echo $programs['prof_first_name'].' '.$programs['prof_last_name']  ?></td>
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