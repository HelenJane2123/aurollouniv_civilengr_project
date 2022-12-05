<?php
    include_once('db_header.php');
    $con  = mysqli_connect("localhost","root","","aurollo_project");
    
        $sql ="SELECT * FROM students group by score_status";
        $result = mysqli_query($con,$sql);
        $chart_data="";
        while ($row = mysqli_fetch_array($result)) { 
            $exam_score[]  = $row['exam_score']  ;
            $score_status[] = $row['score_status'];
        }

        //Enrolled Students per Program
        $enrolled_program ="SELECT b.program_name, count(a.program_id) as program_count FROM students a
                            LEFT JOIN programs b ON a.program_id = b.program_id
                        group by a.program_id";
        $result_ = mysqli_query($con,$enrolled_program);
        $chart_data_="";
        while ($row = mysqli_fetch_array($result_)) { 
            $program_name[]  = $row['program_name']  ;
            $program_count[] = $row['program_count'];
        }
?>
    <h1 class="h3 mb-2 text-gray-800">Analytics</h1>
    <p class="mb-4"></p>
    <div class="row">
        <div class="col-xl-6 col-lg-5">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Student's Ratings by Exam Score</h6>
                </div>
                <div class="card-body" style="height: 700px;">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Donut Chart -->
        <div class="col-xl-6 col-lg-5">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Enrolled Students per Program</h6>
                </div>
                <div class="card-body" style="height: 700px;">
                    <div class="chart-bar">
                        <canvas id="myProgram"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once('db_footer.php');
?>
    

             