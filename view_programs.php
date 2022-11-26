<?php
    include('global/header_program.php');
    require_once ('model/Programs.php');
    $programs = new Programs();
?>
    <!-- Programs -->
    <section id="contact-us" class="mt-5">
        <div class="container">
            <h2 class="text-center text-bold">List of Programs</h2>
            <!-- Topic Cards -->
            <div id="cards_landscape_wrap-2">
                <div class="container">
                    <h4>Take free online classes and courses in civil engineering to build your skills and advance your career.</h4>
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
                                                <button type="button" class="btn btn-secondary">
                                                    Enrollees: <span class="badge badge-light"><?php echo $programs->get_all_students_count_program_id($program['program_id']); ?></span> 
                                                </button>
                                                <br/><br/>
                                                <a class="btn btn-primary" href="login.php"><i class="fa fa-plus"></i> Add this program</a>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    include('global/footer.php');
?>