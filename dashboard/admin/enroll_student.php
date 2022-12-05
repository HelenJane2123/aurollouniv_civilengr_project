<?php
    include('../model/Admin.php'); 
    $admin_enroll = new Admin();
    session_start(); 
    // Enroll a student
    if(isset($_POST['enroll_student'])) {
        $member_id              =   $_POST['prof_member_id'];
        $program_id             =   $_POST['program_id'];
        $student_id             =   $_POST['student_id'];
        $date_modified          =   date("Y-m-d h:i:s");

        //get student member_id
        $get_student_member_id = $admin_enroll->get_student_member_id($student_id);
        $enroll = $admin_enroll->enroll_student($student_id,$member_id,$get_student_member_id['member_id'],$program_id,$date_modified);
        if($enroll) {
            /*Successful*/
            $_SESSION['message_success'] = "New student has been successfully enrolled."; 
            header('location:../admin_students.php');
        }
        else
        {
            /*sorry your profile is not update*/
            $_SESSION['message_error'] = "New student enroll failed. An error has occurred."; 
            header('location:../admin_students.php');
        }
    }
    // Grade a student
    if(isset($_POST['submit_exam_score'])) {
        $student_id                 =   $_POST['student_id'];
        $exam_score                 =   $_POST['exam_score'];
        $prof_comment_if_essay      =   $_POST['prof_comment_if_essay'];
        $date_modified              =   date("Y-m-d h:i:s");

        $grade_essay = $admin_enroll->grade_essay_student($student_id,$exam_score,$prof_comment_if_essay,$date_modified);
        if($enroll) {
            /*Successful*/
            header('location:../admin_students.php');
        }
        else
        {
            /*sorry your profile is not update*/
            $_SESSION['message_error'] = "An error has occurred."; 
            header('location:../admin_students.php');
        }
    }
    //Unenroll Student
    else {
        $id = $_GET['id'];
        $unenroll_student = $admin_enroll->unenroll_student($id);
        if($unenroll_student) {
            $_SESSION['message_success'] = "Student successfully unenrolled."; 
            header('location:../admin_students.php');
        }
        else {
            $_SESSION['message_error'] = "An error has occurred."; 
            header('location:../admin_students.php');
        }
    }
?>