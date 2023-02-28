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
        $update_exam = $admin_exams->update_essay_total_questions($exam_id);
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
            $member_id                  = $_POST['member_id'];
            $program_id                  = $_POST['program_id'];
            $question_no_array          = $_POST['question_no'][$i];
            $question_array             = $_POST['question'][$i];
            $option1_array              = $_POST['option_1'][$i];
            $option2_array              = $_POST['option_2'][$i];
            $option3_array              = $_POST['option_3'][$i];
            $option4_array              = $_POST['option_4'][$i];
            $correct_answer_array       = $_POST['correct_answer'][$i];
            $date_created               = date("Y-m-d h:i:s");
            $random = rand(10,50);

            //upload image
            $question_filename = $random."-".$_FILES['upload_question_image']['name'][$i];
            $img_question_location = "../uploads/questions/".$exam_id."/".$program_id."/".$member_id."/".$question_no_array;
            // Create directory if it does not exist
            if(!is_dir($img_question_location)){
                mkdir('../uploads/questions/'.$exam_id."/".$program_id."/".$member_id."/".$question_no_array, 0777, true);
            }
            $img_question_location .= "/".$question_filename;
            move_uploaded_file($_FILES['upload_question_image']['tmp_name'][$i],$img_question_location);

            if($question_array!=='' ) {
                $add_questions = $admin_exams->add_questions($exam_id,
                    $question_no_array,
                    $question_filename,
                    $question_array,
                    $option1_array,
                    $option2_array,
                    $option3_array,
                    $option4_array,
                    $correct_answer_array,
                    $date_created);
                if($add_questions) {
                    /*Successful*/
                    $_SESSION['message_success'] = "New exam has been successfully added."; 
                    header('location:../admin_exams.php');
                }
                else
                {
                    /*sorry your profile is not update*/
                    $_SESSION['message_error'] = "New exam cannot be added. An error has occurred."; 
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
        // $exam_details_id            = $_POST['exam_details_id'];
        $check_if_exists =  $admin_exams->get_all_questions_by_exam_id($exam_id);
        if($check_if_exists > 0) {
            //$delete_existing_exam = $admin_exams->delete_exam_details($exam_id,$exam_details_id);
            for($i=0;$i<count($_POST['question_update']);$i++){
                $exam_id_                   = $_POST['exam_id'];
                $exam_details_id_            = $_POST['exam_details_id'][$i];
                $question_no_array          = $_POST['question_no_update'][$i];
                $question_array             = $_POST['question_update'][$i];
                $option1_array              = $_POST['option_1_update'][$i];
                $option2_array              = $_POST['option_2_update'][$i];
                $option3_array              = $_POST['option_3_update'][$i];
                $option4_array              = $_POST['option_4_update'][$i];
                $correct_answer_array       = $_POST['correct_answer_update'][$i];
                $member_id                  = $_POST['member_id'];
                $program_id                 = $_POST['program_id'];
                $date_created               = date("Y-m-d h:i:s");
                $random = rand(10,50);
                
                //unlink image first if exist
                rmdir('../uploads/questions/"'.$exam_id.'"/"'.$program_id.'"/"'.$member_id);
                // Create directory if it does not exist
                if(!is_dir($img_question_location)){
                    mkdir('../uploads/questions/'.$exam_id."/".$program_id."/".$member_id."/".$question_no_array, 0777, true);
                }
                //upload image
                $question_filename = $random."-".$_FILES['upload_question_image_update']['name'][$i];
                $img_question_location = "../uploads/questions/".$exam_id."/".$program_id."/".$member_id."/".$question_no_array;
                $img_question_location .= "/".$question_filename;
                move_uploaded_file($_FILES['upload_question_image_update']['tmp_name'][$i],$img_question_location);
                    
                if($question_array !=='') {
                    //Check if there is existing record
                    $update_questions = $admin_exams->update_questions($exam_id_,
                        $question_no_array,
                        $question_array,
                        $question_filename,
                        $option1_array,
                        $option2_array,
                        $option3_array,
                        $option4_array,
                        $correct_answer_array,
                        $exam_details_id_,
                        $date_created);
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
        $delete_exam = $admin_exams->delete_exam($id);
        if($delete_exam) {
            $_SESSION['message_success'] = "Exam has been successfully deleted."; 
            header('location:../admin_exams.php');
        }
        else {
            $_SESSION['message_error'] = "Exam cannot be deleted. An error has occurred."; 
            header('location:../admin_exams.php');
        }
    }
?>