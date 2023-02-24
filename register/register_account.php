<?php
    include('../model/RegisterLogin.php'); 
    session_start();   
    // initializing variables
    $email_address  = "";
    $errors = array(); 
    $funObj = new User(); 

    if (isset($_POST['reg_user'])) {
        // receive all input values from the form
        $first_name       = $_POST['first_name'];
        $last_name        = $_POST['last_name'];
        $email_address    = $_POST['email_address'];
        $mobile_number    = $_POST['mobile_number'];
        $user_type        = $_POST['user_type'];
        $password_1       = $_POST['password'];
        $password_2       = $_POST['confirm_password'];
        $date_created     = date("Y-m-d h:i:sa");
        $fourRandomDigit  = rand(0001,9999);
        $member_id        = "M-".$fourRandomDigit;
      
        if ($password_1 != $password_2) {
          array_push($errors, "The two passwords do not match");
        }
        $query = $funObj->reg_user($member_id,$email_address, $first_name, $last_name, $mobile_number, $user_type, $password_1, $date_created);
        if ($query) {
          $_SESSION['success'] = true;
          $_SESSION['message'] = 'Registration successful. You will received an email once your account is already approved.';
          header('Location:../register.php');
        }
        else {
          $_SESSION['message'] = 'Registration failed. Email or Username already exits please try again';
          header('Location:../register.php');
        }
    }      
?>