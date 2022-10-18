        <!-- Footer-->
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">&copy; Your Website 2022. All Rights Reserved.</div>
                    <a href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Meet our Team</a>
                </div>
            </div>
        </footer>
        <!-- Login Modal-->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-white" id="loginModalLabel">Login</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0 p-4">
                        <form id="contactForm" action="register/login.php" name="login" class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                            <div class="form-group input-group">
                                <span class="input-group-text"><i class="bi-person"></i></span>
                                <input type="email" id="loginName" name="email_address" class="form-control" placeholder="Email" required/>
                            </div>
                        
                            <!-- Password input -->
                            <div class="form-group input-group">
                                <span class="input-group-text"><i class="bi-key"></i></span>
                                <input type="password" id="loginName" name="password" class="form-control" placeholder="Password" required/>
                            </div>
                        
                            <!-- Submit button -->
                            <div class="row mb-4">
                                <button type="submit" class="btn btn-primary btn-block mb-4" name="login_user">Sign in</button>
                            </div>
                        
                            <!-- Register buttons -->
                            <div class="text-center">
                                <p class="text-center">Not a member? <a href="" id="registerModal">Register Here</a> </p>    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Register Modal-->
        <div class="modal fade" id="registerModal">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-gradient-primary-to-secondary p-4">
                    <h5 class="modal-title font-alt text-white" id="loginModalLabel">Register</h5>
                    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="card bg-light">
                        <article class="card-body mx-auto">
                            <h4 class="card-title mt-3 text-center">Create an Account</h4>
                            <p class="text-center">Get started with your free account</p>
                            <form action="register/register.php" name="register" id="register" class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                                <div class="form-group input-group">
                                    <span class="input-group-text"><i class="bi-person"></i></span>
                                    <input name="full_name" class="form-control" placeholder="Full name" type="text" required>
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi-envelope"></i></span>
                                    </div>
                                    <input name="email" class="form-control" placeholder="Email address" type="email" required>
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi-telephone"></i></span>
                                    </div>
                                    <input name="mobile_number" class="form-control" placeholder="Phone number" type="text" required>
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi-building"></i></span>
                                    </div>
                                    <select class="form-control" name="user_type" required>
                                        <option selected=""> Select Type</option>
                                        <option>Student</option>
                                        <option>Professor</option>
                                    </select>
                                </div> <!-- form-group end.// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi-key"></i></span>
                                    </div>
                                    <input class="form-control" name="password" placeholder="Create password" type="password" required>
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi-key"></i></span>
                                    </div>
                                    <input class="form-control" name="confirm_password" placeholder="Confirm password" type="password" required>
                                </div> <!-- form-group// -->
                                <div class="row mb-4">
                                    <button type="submit" name="reg_user" class="btn btn-primary btn-block mb-4">Create an account</button>
                                </div>  
                                <p class="text-center">Have an account? <a href="" id="loginModal">Log In</a> </p>                                                                 
                            </form>
                        </article>
                        </div> <!-- card.// -->
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                
              </div>
            </div>
          </div>
          
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/core_js.js"></script>
    </body>
</html>
