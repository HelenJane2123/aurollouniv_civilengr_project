<!DOCTYPE html>
<html lang="en">
<?php
    require_once ('model/Programs.php');
    $register = new Programs();
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
                                        <h1 class="h4 text-gray-900 mb-2">Reset Password</h1>
                                        <p class="mb-4">Please reset your password here.</p>
                                    </div>
                                    <?php
                                        if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
                                            $key = $_GET["key"];
                                            $email = $_GET["email"];
                                            $curDate = date("Y-m-d H:i:s");
                                            $row = $register->get_pw_reset_tmp_cnt($key,$email);
                                            $error = '';
                                            if ($row == "") {
                                                $error .= '<h2>Invalid Link</h2>';
                                            } else {
                                                $row = $register->get_pw_reset_tmp($key,$email);
                                                $expDate = $row['expDate'];
                                                if ($expDate >= $curDate) {
                                    ?> 
                                                    <form method="post" action="" name="update">
                                                        <input type="hidden" name="action" value="update" class="form-control"/>
                                                        <div class="form-group">
                                                            <label><strong>Enter New Password:</strong></label>
                                                            <input type="password"  name="pass1" value="update" class="form-control"/>
                                                        </div>

                                                        <div class="form-group">
                                                            <label><strong>Re-Enter New Password:</strong></label>
                                                            <input type="password"  name="pass2" value="update" class="form-control"/>
                                                        </div>
                                                        <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                                                        <div class="form-group">
                                                            <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary"/>
                                                        </div>
                                                    </form>
                                    <?php
                                                } else {
                                                    $error .= "<h2>Link Expired</h2>>";
                                                }
                                        }
                                            if ($error != "") {
                                                echo "<div class='error_fg_pw'>" . $error . "</div><br />";
                                            }
                                        }


                                        if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
                                            $error = "";
                                            $pass1 = $_POST["pass1"];
                                            $pass2 = $_POST["pass2"];
                                            $email = $_POST["email"];
                                            $curDate = date("Y-m-d H:i:s");
                                            if ($pass1 != $pass2) {
                                                $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
                                            }
                                            if ($error != "") {
                                                echo $error;
                                            } else {
                                                $pass1 = md5($pass1);
                                                $register->update_password($pass1,$curDate,$email);
                                                $register->delete_pw_tmp($email);
                                                echo '<div class="error_fg_pw"><p>Congratulations! Your password has been updated successfully.</p>';
                                            }
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