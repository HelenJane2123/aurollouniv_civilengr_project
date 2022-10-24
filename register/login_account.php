<?php
    include('../model/RegisterLogin.php'); 
    session_start();
    $funObj = new User(); 
    if (isset($_POST['login_user'])) {
        $email_address = $_POST['email_address'];
        $user_password = $_POST['password'];
        $query = $funObj->check_login($email_address, $user_password);
        if($query) {
          // this login var will use for the session thing
          $_SESSION['login'] = 'success';
          $_SESSION['email_address'] = $email_address;
          $_SESSION['message'] = 'Successful login';
          header('location: ../dashboard/index.php');
        }
        else {
          $_SESSION['login'] = false;
          $_SESSION['message'] = 'Wrong username or password';
        }
    }
?>