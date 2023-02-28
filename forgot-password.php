<!DOCTYPE html>
<html lang="en">
<?php
    require_once ('model/Programs.php');
    $register = new Programs();
    use PHPMailer\PHPMailer\PHPMailer;
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aurollo University - Civil Engineering Reviewer - Forgot Passsword</title>

    <!-- Custom fonts for this template-->
    <link href="dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="dashboard/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
                                    <?php
                                        if(isset($_POST["email"]) && (!empty($_POST["email"]))) {
                                            $email = $_POST["email"];
                                            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                                            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

                                            $error = "";

                                            if (!$email) {
                                                $error .="<p>Invalid email address please type a valid email address!</p>";
                                            }
                                            else {
                                                $get_all_users_cnt = $register->isUserExist($email);
                                                if ($get_all_users_cnt == 0) {
                                                    $error .= "<p>No user is registered with this email address!</p>";
                                                }
                                            }
                                            if($error!="") {
                                                echo "<div class='error_fg_pw'>".$error."</div>
                                                <br /><a href='javascript:history.go(-1)'>Go Back</a>";
                                            }
                                            else {
                                                $expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
                                                $expDate = date("Y-m-d H:i:s",$expFormat);
                                                $key = md5(time());
                                                $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                                                $key = $key . $addKey;
                                                // Insert Temp Table
                                                $register->inserttopasswordreset($email,$key,$expDate);

                                                $output='<p>Dear user,</p>';
                                                $output.='<p>Please click on the following link to reset your password.</p>';
                                                $output.='<p>-------------------------------------------------------------</p>';
                                                $output.='<p><a href="http://localhost/aurollouniv_civilengr_project/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">https://www.allphptricks.com/forgot-password/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
                                                $output.='<p>-------------------------------------------------------------</p>';
                                                $output.='<p>Please be sure to copy the entire link into your browser.
                                                The link will expire after 1 day for security reason.</p>';
                                                $output.='<p>If you did not request this forgotten password email, no action 
                                                is needed, your password will not be reset. However, you may want to log into 
                                                your account and change your security password as someone may have guessed it.</p>';   	
                                                $output.='<p>Thanks,</p>';
                                                $output.='<p>Web Development Team</p>';
                                                $body = $output; 
                                                $subject = "Password Recovery - Admin";

                                                $email_to = $email;
                                                $fromserver = "noreply@yourwebsite.com"; 
                                                require("vendor/autoload.php");
                                                $mail = new PHPMailer();
                                                $mail->IsSMTP();
                                                $mail->Host = "localhost"; // Enter your host here
                                                $mail->SMTPAuth = true;
                                                $mail->Username = "support@webdev.com"; // Enter your email here
                                                $mail->Password = ""; //Enter your passwrod here
                                                $mail->Port = 587;
                                                $mail->IsHTML(true);
                                                $mail->From = "support@webdev.com";
                                                $mail->FromName = "Aurollo University Web Development Team";

                                                $mail->Subject = $subject;
                                                $mail->Body = $body;
                                                $mail->AddAddress($email_to);

                                                if(!$mail->Send()) {
                                                    echo "Mailer Error: " . $mail->ErrorInfo;
                                                }
                                                else {
                                                    echo "<div class='error_fg_pw'>
                                                    <p>An email has been sent to you with instructions on how to reset your password.</p>
                                                    </div><br /><br /><br />";
                                                }
                                            }	

                                        }
                                        else {
                                    ?>
                                        <form class="user" method="post" action="" name="reset">  
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user"
                                                    id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                                                    placeholder="username@email.com">
                                            </div>
                                            <input type="submit" class="btn btn-primary btn-user btn-block"  name="reset_password" value="Reset Password"/>
                                        </form>
                                    <?php 
                                        } 
                                    ?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="dashboard/vendor/jquery/jquery.min.js"></script>
    <script src="dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="dashboard/js/sb-admin-2.min.js"></script>

</body>

</html>