<?php
    include('../model/Student.php'); 
    $student_enroll = new Student();
    session_start(); 
    // Enroll a student
    if(isset($_POST['enroll_program'])) {
        $student_member_id      =   $_POST['stud_member_id'];
        $exam_id                =   $_POST['exam_id'];
        $account_id             =   $_POST['account_id'];
        $date_modified          =   date("Y-m-d h:i:s");

        //get program member_id
        $get_program_id = $student_enroll->get_program_id($exam_id);
        $get_program_member_id = $student_enroll->get_program_member_id($get_program_id['program_id']);
        $enroll = $student_enroll->enroll_program($account_id,$get_program_member_id['member_id'],$student_member_id,$get_program_id['program_id'],$exam_id,$date_modified);
        if($enroll) {
            /*Successful*/
            $_SESSION['message_success'] = "New program has been successfully enrolled."; 
            header('location:../student_programs.php');
        }
        else
        {
            /*sorry your profile is not update*/
            $_SESSION['message_error'] = "New program enroll failed. An error has occurred."; 
            header('location:../student_programs.php');
        }
    }
    //Unenroll Student
    else {
        $id = $_GET['id'];
        $unenroll_student = $student_enroll->unenroll_program($id);
        if($unenroll_student) {
            $_SESSION['message_success'] = "Program successfully unenrolled."; 
            header('location:../student_programs.php');
        }
        else {
            $_SESSION['message_error'] = "An error has occurred."; 
            header('location:../student_programs.php');
        }
    }
?>