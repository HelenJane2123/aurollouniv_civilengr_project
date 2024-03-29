<?php
    include('../model/RegisterLogin.php'); 
    session_start();
    $funObj = new User(); 
    if (isset($_POST['login_user'])) {
        $email_address = $_POST['email_address'];
        $user_password = $_POST['password'];
        $query = $funObj->check_login($email_address);
        if($query == 0) {
          $_SESSION['login'] = false;
          $_SESSION['message'] = 'Wrong username or password or your account has not yet been approved by the admin. Check your email or contact your admin for assistance.';
          header('location: ../login.php');
        }
        else {
          // this login var will use for the session thing
          $_SESSION['login'] = true;
          $_SESSION['email_address'] = $email_address;
          $_SESSION['message'] = 'Successful login.';
          header('location: ../dashboard/index.php');
        }
    }
?>