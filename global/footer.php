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
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <div class="form-group input-group">
                                <span class="input-group-text"><i class="bi-person"></i></span>
                                <input type="email" id="loginName" class="form-control" placeholder="Email or username" />
                            </div>
                        
                            <!-- Password input -->
                            <div class="form-group input-group">
                                <span class="input-group-text"><i class="bi-key"></i></span>
                                <input type="email" id="loginName" class="form-control" placeholder="Password" />
                            </div>
                        
                            <!-- Submit button -->
                            <div class="row mb-4">
                                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                            </div>
                        
                            <!-- Register buttons -->
                            <div class="text-center">
                            <p>Not a member? <a href="#!">Register</a></p>
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
                            <form>
                                <div class="form-group input-group">
                                    <span class="input-group-text"><i class="bi-person"></i></span>
                                    <input name="" class="form-control" placeholder="Full name" type="text">
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi-envelope"></i></span>
                                    </div>
                                    <input name="" class="form-control" placeholder="Email address" type="email">
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi-telephone"></i></span>
                                    </div>
                                    <select class="custom-select" style="max-width: 120px;">
                                        <option selected="">+971</option>
                                        <option value="1">+972</option>
                                        <option value="2">+198</option>
                                        <option value="3">+701</option>
                                    </select>
                                    <input name="" class="form-control" placeholder="Phone number" type="text">
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi-building"></i></span>
                                    </div>
                                    <select class="form-control">
                                        <option selected=""> Select Type</option>
                                        <option>Student</option>
                                        <option>Professor</option>
                                    </select>
                                </div> <!-- form-group end.// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi-key"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Create password" type="password">
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi-key"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Repeat password" type="password">
                                </div> <!-- form-group// -->                                      
                                <div class="row mb-4">
                                    <button type="submit" class="btn btn-primary btn-block mb-4">Create Account</button>
                                </div>  
                                <p class="text-center">Have an account? <a href="">Log In</a> </p>                                                                 
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
        <script src="js/scripts.js"></script>
    </body>
</html>
