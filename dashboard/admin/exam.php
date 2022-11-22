<?php
    include('../model/Admin.php'); 
    $admin_exams = new Admin();
    session_start(); 
    // Add Exam Category
    if(isset($_POST['add_exams'])) {
        $member_id              =   $_POST['member_id'];
        $program_id             =   $_POST['program_id'];
        $exam_category_id       =   $_POST['exam_category_id'];
        $exam_description       =   $_POST['exam_description'];
        $duration               =   $_POST['duration'];
        $total_questions        =   $_POST['total_questions'];
        $status                 =   'Added';
        $date_created           =   date("Y-m-d h:i:sa");

        $add_exams = $admin_exams->add_exams($member_id,$program_id,$exam_category_id,$exam_description,$duration,$total_questions,$status,$date_created);
        if($add_exams) {
            /*Successful*/
            $_SESSION['message_success'] = "New exam has been successfully added."; 
            header('location:../admin_exams.php');
        }
        else
        {
            /*sorry your profile is not update*/
            $_SESSION['message_error'] = "New exam exam cannot be added. An error has occurred."; 
            header('location:../admin_exams.php');
        }
    }
    //Save Essay
    if(isset($_POST['save_essay_question'])) {
        $exam_id            = $_POST['exam_id'];
        $essay              = $_POST['exam_description'];
        $date_created       = date("Y-m-d h:i:sa");

        $add_essay = $admin_exams->add_essays($exam_id,$essay,$date_created);
        if($add_essay) {
            /*Successful*/
            $_SESSION['message_success'] = "New exam has been successfully added."; 
            header('location:../admin_exams.php');
        }
        else
        {
            /*sorry your profile is not update*/
            $_SESSION['message_error'] = "New exam exam cannot be added. An error has occurred."; 
            header('location:../admin_exams.php');
        }

    }
    //Save Multiple Choice
    if(isset($_POST['add_exam_question'])) {
        for($i=0;$i<count($_POST['question']);$i++){
            $exam_id                    = $_POST['exam_id'];
            $question_array             = $_POST['question'][$i];
            $option1_array              = $_POST['option_1'][$i];
            $option2_array              = $_POST['option_2'][$i];
            $option3_array              = $_POST['option_3'][$i];
            $option4_array              = $_POST['option_4'][$i];
            $correct_answer_array       = $_POST['correct_answer'][$i];
            $date_created               = date("Y-m-d h:i:sa");

            //print_r($question_array);

            if($question_array!=='' ) {
                $add_questions = $admin_exams->add_questions($exam_id,$question_array,$option1_array,$option2_array,$option3_array,$option4_array,$correct_answer_array,$date_created);
                if($add_questions) {
                    /*Successful*/
                    $_SESSION['message_success'] = "New exam has been successfully added."; 
                    header('location:../admin_exams.php');
                }
                else
                {
                    /*sorry your profile is not update*/
                    $_SESSION['message_error'] = "New exam exam cannot be added. An error has occurred."; 
                    header('location:../admin_exams.php');
                }
            }
        }
    }
    //Edit Exam Category
    else if(isset($_POST['edit_exam_category'])) {
        $id                    =   $_POST['exam_category_id'];
        $member_id             =   $_POST['member_id'];
        $exam_category         =   $_POST['exam_category'];
        $exam_cat_desc         =   $_POST['exam_cat_desc'];
        $date_created          =   date("Y-m-d h:i:sa");

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