<?php
    include('../model/Admin.php'); 
    $admin_program = new Admin();
    session_start(); 
    // Add Exam Category
    if(isset($_POST['add_exam_category'])) {
        $member_id              =   $_POST['member_id'];
        $exam_category          =   $_POST['exam_category'];
        $exam_cat_desc          =   $_POST['exam_cat_desc'];
        $date_created           =   date("Y-m-d h:i:sa");

        $add_exam_cat = $admin_program->add_exam_category($member_id,$exam_category, $exam_cat_desc,$date_created);
        if($add_exam_cat) {
            /*Successful*/
            $_SESSION['message_success'] = "New exam category has been successfully added."; 
            header('location:../admin_exam_cat.php');
        }
        else
        {
            /*sorry your profile is not update*/
            $_SESSION['message_error'] = "New exam category cannot be added. An error has occurred."; 
            header('location:../add_edit_exam_cat.php?action=add');
        }
    }
    //Edit Exam Category
    else if(isset($_POST['edit_exam_category'])) {
        $id                     =   $_POST['exam_category_id'];
        $member_id              =   $_POST['member_id'];
        $exam_category          =   $_POST['exam_category'];
        $exam_cat_desc          =   $_POST['exam_cat_desc'];
        $date_created           =   date("Y-m-d h:i:sa");

        $update_exam_cat = $admin_program->update_exam_category($id,$member_id,$exam_category, $exam_cat_desc,$date_created);
        if($update_exam_cat) {
            /*Successful*/
            $_SESSION['message_success'] = "Selected exam category has been successfully updated."; 
            header('location:../admin_exam_cat.php');
        }
        else
        {
            /*sorry your profile is not update*/
            $_SESSION['message_error'] = "Selected exam category cannot be updated. An error has occurred."; 
            header("location:../add_edit_exam_cat.php?action=edit&id=$id");
        }
    }
    //Delete function
    else {
        $id = $_GET['id'];
        $delete_exam_cat = $admin_program->delete_exam_category($id);
        if($delete_exam_cat) {
            $_SESSION['message_success'] = "Exam Category has been successfully deleted."; 
            header('location:../admin_exam_cat.php');
        }
        else {
            $_SESSION['message_error'] = "Exam Category cannot be deleted. An error has occurred."; 
            header('location:../admin_exam_cat.php');
        }
    }
?>