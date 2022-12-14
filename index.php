<?php
    include('global/header.php');
    require_once ('model/Programs.php');
    $programs = new Programs();
?>
        <!-- Mashead header-->
        <header class="masthead">
            <div class="container h-100">
              <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                  <h1 class="fw-bolder">Make your dreams come true</h1>
                  <p class="lead"> “Develop a passion for learning. If you do, you will never cease to grow.” — Anthony J. D’Angelo</p>
                  <a href="register.php" class="btn btn-primary py-3 px-4 rounded-pill" >Register now</a>
                </div>
              </div>
            </div>
        </header>
        <!-- Quote/testimonial aside-->
        <aside class="text-center bg-gradient-primary-to-secondary">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xl-8">
                        <div class="h2 fs-1 text-white mb-4">"Learning is a treasure that will follow its owner everywhere." - Chinese Proverb</div>
                    </div>
                </div>
            </div>
        </aside>
         <!-- Basic features section-->
         <section id="about-us">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                    <div class="col-12 col-lg-5">
                        <h2 class="display-4 lh-1 mb-4">About Us</h2>
                        <p class="lead fw-normal text-muted mb-5 mb-lg-0">Our mission is to help the students to reach their desires and dreams to become professionally licensed in their chosen field. In order for that to be achieved, we created friendly community space for the examiners to help and encourage one another. Also they won’t feel alone. </p>
                    </div>
                    <div class="col-sm-8 col-md-5">
                        <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle" src="assets/img/light.jpg" alt="..." /></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-us section-->
        <section class="about-us">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <h1 class="display-5 lh-1 mb-4 text-center">Our Aim</h1>
                    <div class="col-lg-12 order-lg-1 mb-5 mb-lg-0">
                        <div class="container-fluid px-5">
                            <div class="row gx-5">
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-book icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Learn</h3>
                                        <p class="text-muted mb-0">The students may make their time productive by studying at home or in any place where they are comfortable.</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-chat icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Peer review</h3>
                                        <p class="text-muted mb-0">Students may learn from other students as well via peer review or one on one coaching.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-5 mb-md-0">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-gift icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Free to Use</h3>
                                        <p class="text-muted mb-0">Our web based reviewer is free to use with most updated review materials.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-patch-check icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Accessible</h3>
                                        <p class="text-muted mb-0">All our exam materials are accessible.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Programs-->
        <section id="programs" class="cta">
            <div class="cta-content">
                <div class="container px-5">
                    <h2 class="text-white display-1 lh-1 mb-4">
                        Stop waiting.
                        <br />
                        Start learning.
                    </h2>
                </div>
            </div>
        </section>
        <!-- List of Program-->
        <section id="our-team" class="team-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="site-heading text-center">
                            <h1 class="display-5 lh-1 mb-4 text-center">Our Programs</h1>
                            <h4>Your success is our business.</h4>
                        </div>
                    </div>
                </div>
                <div id="cards_landscape_wrap-2">
                    <div class="container">
                        <div class="row">
                            <?php
                                $get_all_programs = $programs->get_all_programs();
                                foreach($get_all_programs as $program) {
                            ?>
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <a href="">
                                        <div class="card-flyer">
                                            <div class="text-box">
                                                <div class="image-box">
                                                    <img src="dashboard/uploads/program_images/<?php echo $program['member_id']; ?>/<?php echo $program['member_id']; ?>_<?php echo $program['upload_image']; ?>" style="height:200px;">
                                                </div>
                                                <div class="text-container">
                                                    <h6><?php echo $program['program_name']; ?></h6>
                                                    <p><?php echo substr_replace($program['short_desc'],'...',150); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                                }
                            ?>

                        </div>
                        <br/>
                        <a href="view_programs.php" class="btn btn-primary">View All Programs</a>
                    </div>
                </div>

            </div>
        </section>

         <!-- Our Contact Us-->
         <section id="contact-us" class="mt-5">
            <div class="container">
                <!--Contact heading-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="site-heading text-center">
                            <h1 class="display-5 lh-1 mb-4 text-center">Contact Us</h1>
                        </div>
                    </div>
                    <!--Grid column-->
                    <div class="col-sm-12 mb-4 col-md-5">
                        <!--Form with header-->
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-primary text-white text-center py-2">
                                    <h3><i class="fa fa-envelope"></i> Tell us what you feel</h3>
                                    <p class="m-0">We would love to hear from you.</p>
                                </div>
                            </div>
                            <?php
                                $errors = [];
                                $errorMessage = '';

                                if (!empty($_POST)) {
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $subject = $_POST['subject'];
                                    $message = $_POST['message'];

                                if (empty($name)) {
                                    $errors[] = 'Name is empty';
                                }

                                if (empty($email)) {
                                    $errors[] = 'Email is empty';
                                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    $errors[] = 'Email is invalid';
                                }

                                if (empty($message)) {
                                    $errors[] = 'Message is empty';
                                }

                                if (empty($errors)) {
                                    $toEmail = 'example@example.com';
                                    $emailSubject = 'New email from your contact form';
                                    $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];
                                    $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
                                    $body = join(PHP_EOL, $bodyParagraphs);

                                    if (mail($toEmail, $emailSubject, $body, $headers)) 

                                        header('Location: thank-you.html');
                                    } else {
                                        $errorMessage = 'Oops, something went wrong. Please try again later';
                                    }

                                } else {

                                    $allErrors = join('<br/>', $errors);
                                    $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
                                }
                            ?>
                            <form  method="post" id="contact-form">
                                    <div class="card-body p-3">
                                        <?php echo((!empty($errorMessage)) ? $errorMessage : '') ?>
                                        <div class="form-group">
                                            <label> Your name </label>
                                            <div class="input-group">
                                            <input value="" type="text" name="name" class="form-control" id="inlineFormInputGroupUsername" placeholder="Your name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Your email</label>
                                            <div class="input-group mb-2 mb-sm-0">
                                                <input style="cursor: pointer;" name="email" type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <div class="input-group mb-2 mb-sm-0">
                                                <input type="text" name="subject" class="form-control" id="inlineFormInputGroupUsername" placeholder="Subject">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Message</label>
                                            <div class="input-group mb-2 mb-sm-0">
                                                <input type="text" class="form-control" name="message">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" name="submit" value="Send Email" class="btn btn-primary btn-block rounded-0 py-2">
                                        </div>
                                    
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Grid column-->
                        
                        <!--Grid column-->
                        <div class="col-sm-12 col-md-7">
                        <!--Google map-->
                        <div class="mb-4">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d117223.77996815204!2d85.3213263!3d23.3432048!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x11b5a9b0042eef56!2sourcita.com!5e0!3m2!1sen!2sin!4v1589706571407!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <!--Buttons-->
                        <div class="row text-center">
                            <div class="col-md-4">
                                <p class="text-black"> Your Address ….. </p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-black">+91- 90000000</p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-black"> your@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <!--Grid column-->
                </div>
            </div>
        </section>
<?php
    include('global/footer.php');
?>