<?php
    include('../model/Student.php'); 
    $student_profile = new Student(); 

    if(isset($_POST['submit_exam'])) {
        $score              =   $_POST['score'];
        $score_status       =   $_POST['score_status'];
        $student_id         =   $_POST['student_id'];
        $date_modified      =   date("Y-m-d h:i:sa");

        $update_profile = $student_profile->update_student_exam($score,$score_status,$student_id,$date_modified);

        if($update_profile) {
            /*Successful*/
            header('location:../student_exams.php');
        }
        else
        {
            /*sorry your profile is not update*/
            header('location:../student_exams.php');
        }
    }
?>