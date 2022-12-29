<?php
    include('../model/Admin.php'); 
    $admin_exams = new Admin();
    session_start();
    
    //Save Survey
    if(isset($_POST['add_survey_list'])) {
        $member_id                  = $_POST['member_id'];
        $survey_title               = $_POST['survey_title'];
        $survey_description         = $_POST['survey_description'];
        $date_created               = date("Y-m-d h:i:s");

        $add_questions = $admin_exams->add_survey($member_id,
            $survey_title,
            $survey_description,
            $date_created);
        if($add_questions) {
            /*Successful*/
            $_SESSION['message_success'] = "New survey has been successfully added."; 
            header('location:../admin_survey.php');
        }
        else
        {
            /*sorry your profile is not update*/
            $_SESSION['message_error'] = "New survey cannot be added. An error has occurred."; 
            header('location:../admin_survey.php');
        }
    }
    else if(isset($_POST['add_survey_questions'])) {
        for($i=0;$i<count($_POST['survey_question']);$i++){
            $survey_id                    = $_POST['survey_id'];
            $question_array                 = $_POST['survey_question'][$i];
            $option1_array                  = $_POST['survey_1'][$i];
            $option2_array                  = $_POST['survey_2'][$i];
            $option3_array                  = $_POST['survey_3'][$i];
            $option4_array                  = $_POST['survey_4'][$i];
            $date_created               = date("Y-m-d h:i:s");

            if($question_array!=='' ) {
                $add_questions = $admin_exams->add_survey_questions($survey_id,
                    $question_array,
                    $option1_array,
                    $option2_array,
                    $option3_array,
                    $option4_array,
                    $date_created);
                if($add_questions) {
                    /*Successful*/
                    $_SESSION['message_success'] = "New survey questions has been successfully added."; 
                    header('location:../admin_survey_questions.php');
                }
                else
                {
                    /*sorry your profile is not update*/
                    $_SESSION['message_error'] = "New survey questions cannot be added. An error has occurred."; 
                    header('location:../admin_survey_questions.php');
                }
            }
        }
    }
    else if(isset($_POST['update_survey_question'])) {
        for($i=0;$i<count($_POST['question_update']);$i++){
            $survey_id                      = $_POST['survey_id'];
            $survey_questions_id            = $_POST['survey_questions_id'];
            $question_array                 = $_POST['question_update'][$i];
            
            if(isset($_POST['survey_1'])) {
                $option1_array                  = $_POST['survey_1'][$i];
            }
            else {
                $option1_array                  = "";
            }

            if(isset($_POST['survey_2'])) {
                $option2_array                  = $_POST['survey_2'][$i];
            }
            else {
                $option2_array                  = "";
            }

            if(isset($_POST['survey_3'])) {
                $option3_array                  = $_POST['survey_3'][$i];
            }
            else {
                $option3_array                  = "";
            }

            if(isset($_POST['survey_4'])) {
                $option4_array                  = $_POST['survey_4'][$i];
            }
            else {
                $option4_array                  = "";
            }


            // $option2_array                  = $_POST['survey_2'][$i];
            // $option3_array                  = $_POST['survey_3'][$i];
            // $option4_array                  = $_POST['survey_4'][$i];

            if($question_array!=='' ) {
                $add_questions = $admin_exams->update_survey_questions($survey_id,
                    $survey_questions_id,
                    $question_array,
                    $option1_array,
                    $option2_array,
                    $option3_array,
                    $option4_array);
                if($add_questions) {
                    /*Successful*/
                    $_SESSION['message_success'] = "Survey questions has been successfully updated."; 
                    header('location:../admin_survey_questions.php');
                }
                else
                {
                    /*sorry your profile is not update*/
                    $_SESSION['message_error'] = "Survey questions questions cannot be updated. An error has occurred."; 
                    header('location:../admin_survey_questions.php');
                }
            }
        }
    }
    else if(isset($_POST['update_survey'])) {
        $member_id                  = $_POST['member_id'];
        $survey_id                  = $_POST['survey_id'];
        $survey_title               = $_POST['survey_title'];
        $survey_description         = $_POST['survey_description'];
        $date_modified               = date("Y-m-d h:i:s");

        $update_survey = $admin_exams->update_survey($survey_id,
            $survey_description,
            $survey_title,
            $date_modified);
        if($update_survey) {
            /*Successful*/
            $_SESSION['message_success'] = "The selected survey has been successfully updated."; 
            header('location:../admin_survey.php');
        }
        else
        {
            /*sorry your profile is not update*/
            $_SESSION['message_error'] = "The selected survey cannot be updated. An error has occurred."; 
            header('location:../admin_survey.php');
        }
    }
    else if(isset($_POST['enroll_student_survey'])) {
        $survey_id              =   $_POST['survey_id'];
        $student_id             =   $_POST['student_id'];
        $date_created          =   date("Y-m-d h:i:s");

        $student_member_id = $admin_exams->get_student_member_id($student_id);
        $enroll = $admin_exams->enroll_student_survey($survey_id,$student_member_id['member_id'],$date_created);
        if($enroll) {
            /*Successful*/
            $_SESSION['message_success'] = "New student has been successfully enrolled."; 
            header('location:../admin_survey_list.php');
        }
        else
        {
            /*sorry your profile is not update*/
            $_SESSION['message_error'] = "New student enroll failed. An error has occurred."; 
            header('location:../admin_survey_list.php');
        }
    }
    else if($_GET['student_id']) {
        $student_survey_id   =   $_GET['student_id'];
        $unenroll = $admin_exams->unenroll_student_survey($student_survey_id);
        if($unenroll) {
            /*Successful*/
            $_SESSION['message_success'] = "Student has been successfully unenrolled."; 
            header('location:../admin_survey_list.php');
        }
        else
        {
            /*sorry your profile is not update*/
            $_SESSION['message_error'] = "Student unenroll failed. An error has occurred."; 
            header('location:../admin_survey_list.php');
        }
    }
    //Delete function
    else {
        $id = $_GET['survey_id'];
        $delete_exam = $admin_exams->delete_survey($id);
        if($delete_exam) {
            $_SESSION['message_success'] = "Survey has been successfully deleted."; 
            header('location:../admin_survey.php');
        }
        else {
            $_SESSION['message_error'] = "Survey cannot be deleted. An error has occurred."; 
            header('location:../admin_survey.php');
        }
    }
?>