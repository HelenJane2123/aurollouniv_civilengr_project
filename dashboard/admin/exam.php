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
        $date_created           =   date("Y-m-d h:i:s");

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
        $date_created       = date("Y-m-d h:i:s");

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
            $date_created               = date("Y-m-d h:i:s");

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
    //Edit Save Essay
    if(isset($_POST['save_update_essay_question'])) {
        $exam_id            = $_POST['exam_id'];
        $essay              = $_POST['essay'];
        $date_created       = date("Y-m-d h:i:s");

        $update_essay = $admin_exams->update_essays($exam_id,$essay,$date_created);
        if($update_essay) {
            /*Successful*/
            $_SESSION['message_success'] = "New exam has been successfully updated."; 
            header('location:../admin_exams.php');
        }
        else
        {
            /*sorry your profile is not update*/
            $_SESSION['message_error'] = "New exam exam cannot be updated. An error has occurred."; 
            header('location:../admin_exams.php');
        }
    }
    //Save Multiple Choice
    if(isset($_POST['update_exam_question'])) {
        $exam_id                    = $_POST['exam_id'];
        $check_if_exists =  $admin_exams->get_all_questions_by_exam_id($exam_id);
        if($check_if_exists > 0) {
            $delete_existing_exam = $admin_exams->delete_exam($exam_id);
            for($i=0;$i<count($_POST['question_update']);$i++){
                $exam_id_                   = $_POST['exam_id'];
                $question_array             = $_POST['question_update'][$i];
                $option1_array              = $_POST['option_1_update'][$i];
                $option2_array              = $_POST['option_2_update'][$i];
                $option3_array              = $_POST['option_3_update'][$i];
                $option4_array              = $_POST['option_4_update'][$i];
                $correct_answer_array       = $_POST['correct_answer_update'][$i];
                $date_created               = date("Y-m-d h:i:s");
                    
                if($question_array !=='') {
                    //Check if there is existing record
                    $update_questions = $admin_exams->update_questions($exam_id_,$question_array,$option1_array,$option2_array,$option3_array,$option4_array,$correct_answer_array,$date_created);
                    if($update_questions) {
                        /*Successful*/
                        $_SESSION['message_success'] = "Exam has been successfully updated."; 
                        header('location:../admin_exams.php');
                    }
                    else
                    {
                        $_SESSION['message_error'] = "Exam exam cannot be updated. An error has occurred."; 
                        header('location:../admin_exams.php');
                    }
                }
            }
        }
    }
    //Delete function
    else {
        $id = $_GET['id'];
        $delete_exam_cat = $admin_exams->delete_exam_category($id);
        if($delete_exam_cat) {
            $_SESSION['message_success'] = "Exam has been successfully deleted."; 
            header('location:../admin_exams.php');
        }
        else {
            $_SESSION['message_error'] = "Exam cannot be deleted. An error has occurred."; 
            header('location:../admin_exams.php');
        }
    }
?>