<?php
    require_once ("../lib/config.php");
	class Admin {
		public $db;
		public function __construct(){
			$this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;
			}
		}
		/*** Add new program ***/
		public function add_new_program($member_id, 
                $program_name, 
                $short_desc,
                $with_exam,
                $filename,
                $filename_files,
                $date_created){
            //$check =  $this->isProgramIDExist($member_id);
            //if (!$check){
                $sql1="INSERT INTO programs SET program_name='$program_name',member_id='$member_id',short_desc='".mysqli_real_escape_string($this->db,$short_desc)."', 
                            with_exam='$with_exam', 
                            upload_image='$filename',
                            date_created='$date_created'";
                $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                //get last inserted id
                $last_id = mysqli_insert_id($this->db);
                //insert uploaded files
                $sql2="INSERT INTO program_additioonal_info SET program_id='$last_id',program_uploaded_files='$filename_files'";
                $result2 = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
                return $result;
            // }
            // else{
            //     return false;
            // }
		}

        /*** Update new program ***/
		public function update_program($id,
            $program_name, 
            $short_desc,
            $with_exam,
            $filename,
            $filename_files,
            $date_modified){

                $sql1="UPDATE programs SET program_name='$program_name',short_desc='$short_desc', 
                            with_exam='$with_exam', 
                            upload_image='$filename',
                            date_modified='$date_modified' WHERE program_id='$id'";
                $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                //insert uploaded files
                $sql2="UPDATE program_additioonal_info SET program_uploaded_files='$filename_files' WHERE program_id='$id'";
                $result2 = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
                
                return $result;
        }

        /*** Delete a program ***/
        public function delete_program($id) {
            $delete_program = "DELETE FROM programs WHERE program_id=$id";
            $result = mysqli_query($this->db,$delete_program) or die(mysqli_connect_errno()."Data cannot be deleted");

            //Delete linked table
            $sql2="DELETE FROM program_additioonal_info WHERE program_id=$id";
            $result2 = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot be deleted");

            return $result;
        }

    	/*** for showing the List of Porgrams ***/
    	public function get_all_program_list($member_id){
    		$sql3="SELECT * FROM programs a
                    LEFT JOIN program_additioonal_info b ON a.program_id = b.program_id
                    WHERE a.member_id = '$member_id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    	}

        /*** for showing the List of Programs with exams ***/
    	public function get_all_program_list_exam($member_id){
    		$sql3="SELECT * FROM programs a
                    LEFT JOIN program_additioonal_info b ON a.program_id = b.program_id
                    WHERE a.member_id = '$member_id'
                    AND a.with_exam = '1'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    	}

		 /*** check if program already exist ***/
        public function isProgramIDExist($id){
            $sql="SELECT * FROM programs WHERE program_id='$id'";
            $check =  $this->db->query($sql);
            $count_row = $check->num_rows;
            if($count_row == 0) {
                return false;
            }
            else {
                return true;
            }
        }

        /*** profile update ***/
        public function admin_profile_update($program_name,$short_desc,$with_exam,$fileName_program,$move_file_image,$date_created,$created_by){
            $check =  $this->isProgramExist($program_name);
            if (!$check){
                $sql1="INSERT INTO programs SET program_name='$program_name',short_desc='$short_desc', 
                            with_exam='$with_exam', 
                            upload_program_lesson='$fileName_program', 
                            upload_image='$move_file_image',
                            date_created='$date_created'";
                $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                return $result;
            }
            else{
                return false;
            }
		}

        /*** get admin profile info ***/
        public function get_admin_info($email_address){
    		$sql3="SELECT CONCAT_WS(' ', a.firstname, a.last_name) as fullname, 
                        a.firstname, 
                        a.last_name, 
                        a.member_id, 
                        a.email_address,
                        a.gender, 
                        a.age,
                        a.birthday,
                        a.religion,
                        a.blood_type,
                        a.phone_number,
                        b.academic_year,
                        b.teaching_class,
                        b.section
                FROM user_account a 
                LEFT JOIN user_additional_information b ON b.member_id = a.member_id
                WHERE a.email_address = '$email_address' AND user_type='Professor'";
	        $result = mysqli_query($this->db,$sql3);
	        return $user_data = mysqli_fetch_assoc($result);
    	}

        /*** get program info by program id ***/
        public function get_program_by_id($id){
            $sql3="SELECT * FROM programs a 
                LEFT JOIN 	program_additioonal_info b ON b.program_id = a.program_id
                WHERE a.program_id = '$id'";
            $result = mysqli_query($this->db,$sql3);
            return $user_data = mysqli_fetch_assoc($result);
        }

         /*** get program count ***/
        public function get_all_programs_count($member_id) {
            $sql="SELECT * FROM programs WHERE member_id='$member_id'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }

        /*** for showing the fullname ***/
    	public function get_fullname($email_address){
    		$sql3="SELECT CONCAT_WS(' ', firstname, last_name) as fullname FROM user_account WHERE email_address = '$email_address'";
	        $result = mysqli_query($this->db,$sql3);
	        $user_data = mysqli_fetch_array($result);
	        return $user_data['fullname'];
    	}

    	/*** for showing the user type ***/
    	public function get_usertype($email_address){
    		$sql3="SELECT user_type FROM user_account WHERE email_address = '$email_address'";
	        $result = mysqli_query($this->db,$sql3);
	        $user_data = mysqli_fetch_array($result);
	        return $user_data['user_type'];
    	}

        /*** User logout ***/
        public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }

        /*** get member id ***/
        public function get_memberid($member_id) {
            $sql3="SELECT member_id
                FROM user_account 
                WHERE member_id = '$member_id' AND user_type='Professor'";
	        $result = mysqli_query($this->db,$sql3);
	        $member_id = mysqli_fetch_array($result);
	        return $member_id['member_id'];
        }

        /*** get member id from additional info ***/
        public function get_memberid_additional_info($member_id) {
            $sql3="SELECT member_id
                FROM user_additional_information
                WHERE member_id = '$member_id'";
            $result = mysqli_query($this->db,$sql3);
            $member_id = mysqli_fetch_array($result);
            return $member_id['member_id'];
        }

        /*** update user profile ***/
        public function update_profile($member_id, 
                $firstname, 
                $last_name,
                $gender,
                $age,
                $phone_number,
                $birthday,
                $religion,
                $blood_type,
                $filename,
                $academic_year,
                $teaching_class,
                $section,
                $date_modified) {
            $sql1="UPDATE user_account SET firstname='$firstname',last_name='$last_name', 
                            gender='$gender', 
                            age='$age', 
                            phone_number='$phone_number',
                            birthday = '$birthday',
                            religion = '$religion',
                            blood_type = '$blood_type',
                            upload_image = '$filename',
                            date_updated='$date_modified'
                    WHERE member_id = '$member_id' AND user_type='Professor'";
            //Check if there is existing account id in user_additional_information table
            $check_if_exists =  $this->get_memberid_additional_info($member_id);
            if($check_if_exists) {
                //If exists update info
                $sql2="UPDATE user_additional_information SET academic_year='$academic_year',teaching_class='$teaching_class', 
                            section='$section' WHERE member_id = '$member_id'";
                $result1 = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot be updated");
            }
            else {
                //insert new record
                $sql2="INSERT INTO user_additional_information SET member_id='$member_id', academic_year='$academic_year',teaching_class='$teaching_class', 
                            section='$section'";
                $result1 = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
            }
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be updated");
            return $result;
        }


        public function add_exam_category($member_id,$exam_category, $exam_cat_desc,$date_created) {
            $sql1="INSERT INTO exam_category SET member_id='$member_id',exam_category='$exam_category', 
                        exam_cat_desc='$exam_cat_desc', 
                        date_created='$date_created'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
            return $result;
        }

        /*** for showing the List of Survey ***/
    	public function get_all_survey_list($member_id){
    		$sql3="SELECT * FROM survey a
                    WHERE a.member_id = '$member_id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    	}

        /*** get exam cat info by exam cat id ***/
        public function get_exam_cat_by_id($id){
            $sql3="SELECT * FROM exam_category a 
                WHERE a.exam_category_id = '$id'";
            $result = mysqli_query($this->db,$sql3);
            return $user_data = mysqli_fetch_assoc($result);
        }

        /*** update exam cat info by exam cat id ***/
        public function update_exam_category($id,$member_id,$exam_category, $exam_cat_desc,$date_created) {
            $sql1="UPDATE exam_category SET member_id='$member_id',exam_category='$exam_category', 
                        exam_cat_desc='$exam_cat_desc', 
                        date_created='$date_created'
                    WHERE exam_category_id='$id'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be updated");
            return $result;
        }

        /*** Delete a exam category ***/
        public function delete_exam_category($id) {
            $delete_exam_cat = "DELETE FROM exam_category WHERE exam_category_id=$id";
            $result = mysqli_query($this->db,$delete_exam_cat) or die(mysqli_connect_errno()."Data cannot be deleted");
            return $result;
        }

        /*** Add new exam ***/
        public function add_exams($member_id,$program_id,$exam_category_id,$exam_description,$duration,$total_questions,$status,$date_created) {
            $sql1="INSERT INTO exam SET member_id='$member_id',exam_category_id='$exam_category_id', 
                        program_id='$program_id',
                        exam_description = '".mysqli_real_escape_string($this->db,$exam_description)."',
                        duration = '$duration',
                        total_questions = '$total_questions',
                        exam_status = '$status',
                        date_created='$date_created'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
            return $result;
        }

         /*** get all programs with exam ***/
         public function get_all_program_exam_count($member_id) {
            $sql="SELECT * FROM programs WHERE member_id='$member_id' AND with_exam = '1'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }

        /*** Get all exams list ***/
    	public function get_all_exams_list($member_id){
    		$sql3="SELECT * FROM exam a
                    LEFT JOIN programs b on b.program_id = a.program_id
                    WHERE a.member_id = '$member_id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    	}


        public function getQueByOrder_exam_details($exam_id){
    		$sql3="SELECT * FROM exam_details a
                    WHERE a.exam_id = '$exam_id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data= mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

        public function getQueByOrder_exam_details_answer($question_no,$exam_details_id){
    		$sql3="SELECT * FROM exam_details_answer a
                    WHERE a.question_no = '$question_no'
                    AND a.exam_details_id = '$exam_details_id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data= mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

        public function getQueByOrder_correct_answer($question_no,$exam_details_id){
    		$sql3="SELECT * FROM exam_details_answer a
                    WHERE a.question_no = '$question_no'
                    AND a.exam_details_id = '$exam_details_id'
                    AND a.correct_answer = '1'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data= mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

        /*** Get all exams by ID ***/
    	public function get_all_exams_id($id){
    		$sql3="SELECT * FROM exam a
                    WHERE a.exam_id = '$id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    	}
        /*** Add new essay ***/
        public function add_essays($exam_id,$essay,$date_created) {
            $sql1="INSERT INTO exam_essay SET exam_id='$exam_id',essay='$essay', 
                        date_created='$date_created'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
            return $result;
        }
        /*** update essay ***/
        public function update_essays($exam_id,$essay,$date_created) {
            $sql1="UPDATE exam_essay SET essay='$essay', 
                        date_modified='$date_created'
                    WHERE exam_id='$exam_id'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot updated");
            return $result;
        }
        /*** Add new questions ***/
        public function add_questions($exam_id,$question_no_array,$question_filename,$question_array,$option1_array,$option2_array,$option3_array,$option4_array,$correct_answer_array,$date_created) {
            $ans = array();
            $ans[1] = $option1_array;
            $ans[2] = $option2_array;
            $ans[3] = $option3_array;
            $ans[4] = $option4_array;
           
                $sql1="INSERT INTO exam_details SET exam_id='$exam_id',question='".mysqli_real_escape_string($this->db,$question_array)."',
                    question_no = '$question_no_array',
                    question_image = '$question_filename',
                    date_created='$date_created'";
                $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                $last_id = mysqli_insert_id($this->db);
                if($result) {
                    //Check if there is existing exam details answer for the selected exam id
                    $check_questions_exst = $this->get_all_questions_detials_by_exam_id($exam_id);
                    if($check_questions_exs > 0) {
                        $this->delete_exam_details($exam_id);
                        $this->delete_exam_details_answer($exam_id);
                    }
                    else {
                        foreach ($ans as $key => $ansName) {
                            if ($ansName != '') {
                                if ($correct_answer_array == $key) {
                                    $sql2="INSERT INTO exam_details_answer SET question_no='$question_no_array',exam_details_id='$last_id',answers='$ansName',
                                    correct_answer = '1'";
                                    $result_question = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
                                }
                                else {
                                    $sql2="INSERT INTO exam_details_answer SET question_no='$question_no_array',exam_details_id='$last_id',answers='$ansName',
                                    correct_answer = '0'";
                                    $result_question = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
                                }
                            }
                        }
                    }
                }
            return $result;
        }
        /*** Update questions ***/
        public function update_questions($exam_id,$question_array,$option1_array,$option2_array,$option3_array,$option4_array,$correct_answer_array,$date_created) {
            $sql1="INSERT INTO exam_details SET exam_id='$exam_id',question='".mysqli_real_escape_string($this->db,$question_array)."',
                option_1 = '$option1_array',
                option_2 = '$option2_array',
                option_3 = '$option3_array',
                option_4 = '$option4_array',
                correct_answer = '$correct_answer_array',
                date_modified='$date_created'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot update");
            return $result;
        }
        /*** Delete questions ***/
        public function delete_exam_details($exam_id) {
            //Delete all questions first
            $delete_exam = "DELETE FROM exam_details WHERE exam_id = $exam_id";
            $result_1 = mysqli_query($this->db,$delete_exam) or die(mysqli_connect_errno()."Data cannot be deleted");
        }

        /*** Delete questions details ***/
        public function delete_exam_details_answer($exam_id) {
            //Delete all questions first
            $delete_exam = "DELETE FROM exam_details_answers WHERE exam_id = $exam_id";
            $result_1 = mysqli_query($this->db,$delete_exam) or die(mysqli_connect_errno()."Data cannot be deleted");
        }

        /*** Delete questions ***/
        public function delete_exam($exam_id) {
            //Delete all questions first
            $delete_exam = "DELETE FROM exam WHERE exam_id = $exam_id";
            $result_1 = mysqli_query($this->db,$delete_exam) or die(mysqli_connect_errno()."Data cannot be deleted");
        }
        
        public function get_all_questions_by_exam_id($exam_id) {
            $sql="SELECT * FROM exam_details WHERE exam_id='$exam_id'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }

        public function get_all_questions_detials_by_exam_id($exam_id) {
            $sql="SELECT * FROM exam_details_answer WHERE exam_details_id='$exam_id'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }

        public function get_all_essays_by_exam_id($exam_id) {
            $sql="SELECT * FROM exam_essay WHERE exam_id='$exam_id'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }

        public function get_all_essays_exam($exam_id) {
    		$sql3="SELECT * FROM exam_essay a
                    WHERE a.exam_id = '$exam_id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_assoc($result);
        }

        public function get_essay_answer($student_id) {
    		$sql3="SELECT * FROM exam_essay a
                    WHERE a.exam_essay_id = '$id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_assoc($result);
        }

        public function get_all_exam_details($exam_id) {
    		$sql3="SELECT * FROM exam_details a
                    LEFT JOIN exam_details_answer b ON a.exam_details_id = b.exam_details_id
                    WHERE a.exam_id = '$exam_id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        
        public function get_all_students_list($member_id) {
    		$sql3="SELECT * FROM students a
                    LEFT JOIN programs b on b.program_id = a.program_id
                    LEFT JOIN user_account c on c.member_id = a.student_member_id
                    LEFT JOIN user_additional_information d on d.member_id = c.member_id
                    LEFT JOIN exam e on b.program_id = e.program_id
                    WHERE a.member_id = '$member_id'
                    AND c.user_type = 'Student'
                    AND unenroll_student = '0'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        public function get_all_students() {
    		$sql3="SELECT * FROM user_account 
                    WHERE user_type = 'Student'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        
        public function get_all_students_graph() {
    		$sql3="SELECT 
                        student_id,
                        exam_score,
                        score_status 
                    FROM students
                ORDER BY student_id";
	        $result = mysqli_query($this->db,$sql3);
	        return $result;
        }
        /*** get student by id ***/
        public function get_student_member_id($id){
            $sql3="SELECT member_id FROM user_account a 
                WHERE a.id = '$id'";
            $result = mysqli_query($this->db,$sql3);
            return $user_data = mysqli_fetch_assoc($result);
        }
        /*** Enroll a student ***/
        public function enroll_student($student_id,$member_id,$get_student_member_id,$program_id,$date_modified) {
            $sql1="INSERT INTO students SET account_id='$student_id',member_id='$member_id',
                student_member_id = '$get_student_member_id',
                program_id = '$program_id',
                stud_exam_status = '0',
                date_modified='$date_modified'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot update");
            return $result;
        }
        /*** Get Student Details ***/
        public function get_student_details($student_id) {
    		$sql3="SELECT * FROM students a
                    LEFT JOIN programs b on b.program_id = a.program_id
                    LEFT JOIN program_additioonal_info e on b.program_id = e.program_id
                    LEFT JOIN user_account c on c.id = a.account_id
                    LEFT JOIN user_additional_information d on d.member_id = c.member_id
                    WHERE a.student_id = '$student_id'
                    AND c.user_type = 'Student'";
	        $result = mysqli_query($this->db,$sql3);
            return $user_data = mysqli_fetch_assoc($result);
        }

        /*** Get Student Details ***/
        public function get_student_details_by_essay_exam_id($student_id,$exam_id) {
            $sql3="SELECT * FROM exam_essay a
                    INNER JOIN exam b ON b.exam_id = a.exam_id
                    INNER JOIN students c ON c.program_id = b.program_id
                    INNER JOIN student_essay_answer d ON a.exam_essay_id = d.exam_essay_id
                    WHERE c.student_id = '$student_id'
                    AND b.exam_id = '$exam_id'";
            $result = mysqli_query($this->db,$sql3);
            return $user_data = mysqli_fetch_assoc($result);
        }

        public function grade_essay_student($student_id,$exam_score,$prof_comment_if_essay,$date_modified) {
            if(($exam_score >= 25 && $exam_score < 60) || ($exam_score == 0)) {
                $score_staus = 'Failed';
            }
            elseif($exam_score >= 60 && $exam_score < 80) {
                $score_staus = 'Satisfactory';
            }
            elseif($exam_score >= 80 && $exam_score < 95) { 
                $score_staus = 'Passed';
            }
            elseif($exam_score >= 95 && $exam_score <= 100) { 
                $score_staus = 'Outstanding';
            }
            $sql1="UPDATE students SET exam_score='$exam_score', 
                        prof_comment_if_essay='$prof_comment_if_essay',
                        score_status='$score_staus',
                        date_modified = '$date_modified'
                    WHERE student_id='$student_id'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot updated");
            return $result;
        }

        /*** unenroll student ***/
        public function unenroll_student($id) {
            $date = date("Y-m-d h:i:s");
            $sql1="UPDATE students SET unenroll_student='1', 
                        date_modified='$date'
                    WHERE account_id='$id'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot updated");
            return $result;
        }

        /*** get all enrolled students ***/
        public function get_all_students_count($member_id) {
            $sql="SELECT * FROM students WHERE member_id='$member_id' AND unenroll_student = '0'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }
         /*** get all enrolled students ***/
         public function get_all_students_count_program_id($program_id) {
            $sql="SELECT * FROM students WHERE program_id='$program_id' AND unenroll_student = '0'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }
        /*** get all program id from exam ***/
        public function get_all_program_from_exam($id) {
            $sql="SELECT * FROM exam WHERE program_id='$id'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }
        /*** get all students program id from exam ***/
        public function get_all_students_program_id($id) {
            $sql="SELECT * FROM students a
                LEFT JOIN user_account b ON b.id = a.account_id
                LEFT JOIN user_additional_information c ON c.member_id = b.member_id
                WHERE program_id='$id'";
	        $result = mysqli_query($this->db,$sql);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        /*** get all students with not yet started ***/
        public function get_all_students_not_started($id) {
            $sql="SELECT * FROM students
                WHERE program_id='$id'
                AND stud_exam_status = '0'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }
        /*** get all students with ongoing exam ***/
        public function get_all_students_ongoing($id) {
            $sql="SELECT * FROM students
                WHERE program_id='$id'
                AND stud_exam_status = '1'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }
        /*** get all students with completed exam ***/
        public function get_all_students_completed($id) {
            $sql="SELECT * FROM students
                WHERE program_id='$id'
                AND stud_exam_status = '2'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }

        //Add survey
        public function add_survey($member_id,
            $survey_title,
            $survey_description,
            $date_created) {

            $sql1="INSERT INTO survey SET member_id='$member_id',survey_title='".mysqli_real_escape_string($this->db,$survey_title)."',
                survey_description='".mysqli_real_escape_string($this->db,$survey_description)."',
                date_created='$date_created'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
            $last_id = mysqli_insert_id($this->db);
            return $result;
        }

         /*** Delete a survey ***/
         public function delete_survey($id) {
            $delete_program = "DELETE FROM survey WHERE survey_id=$id";
            $result = mysqli_query($this->db,$delete_program) or die(mysqli_connect_errno()."Data cannot be deleted");

            return $result;
        }

         /*** Delete a survey ***/
         public function delete_survey_details($id) {
            $sql2="DELETE FROM survey_details WHERE survey_questions_id=$id";
            $result2 = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot be deleted");

            return $result2;
        }

        /*** get survey info by id ***/
        public function get_survey_by_id($id){
            $sql3="SELECT * FROM survey a 
                WHERE a.survey_id = '$id'";
            $result = mysqli_query($this->db,$sql3);
            return $user_data = mysqli_fetch_assoc($result);
        }

        /*** get survey info by id ***/
        public function get_survey_options($survey_questions_id){
    		$sql3="SELECT * FROM survey_details a
                    WHERE a.survey_questions_id = '$survey_questions_id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data= mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

        public function get_my_survey($survey_id) {
    		$sql3="SELECT * FROM survey a
                    WHERE a.survey_id = $survey_id";
	        $result = mysqli_query($this->db,$sql3);
	        return $user_data = mysqli_fetch_assoc($result);
        }

        public function get_survey_questions($survey_questions_id){
    		$sql3="SELECT * FROM survey_questions a
                    WHERE a.survey_questions_id = '$survey_questions_id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data= mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

        public function get_survey_questions_by_survey_id($survey_id){
    		$sql3="SELECT * FROM survey_questions a
                    WHERE a.survey_id = '$survey_id'
                    ORDER BY abs($survey_id) asc";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data= mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

        public function getSurveyOptions($id,$survey_id){
            $query = "SELECT * FROM survey_questions a
                    LEFT JOIN survey_details b ON a.survey_questions_id = b.survey_questions_id
                WHERE a.question_no='$id' AND a.survey_id = '$survey_id'";
            $getData =  mysqli_query($this->db,$query);
            return $getData;
        }

        public function getSurveyAnswerCount($survey_id){
            $sql3="SELECT * FROM student_survey_answer a
                    LEFT JOIN student_survey b ON a.student_survey_id = b.student_survey_id
                    WHERE b.survey_id = '$survey_id'";
            $check =  $this->db->query($sql3);
            return $count_row = $check->num_rows;
        }

        public function getSurveyAnswer($survey_id,$survey_questions_id){
            $query = "SELECT * FROM student_survey_answer a
                    LEFT JOIN survey_questions b ON a.survey_questions_id = b.survey_questions_id
                    WHERE b.survey_id='$survey_id'
                    AND b.survey_questions_id = '$survey_questions_id'";
            $result =  $this->db->query($query);
            return $result_data= mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

        //Update survey
        public function update_survey($survey_id,
            $survey_description,
            $survey_title,
            $date_modified) {

            $sql1="UPDATE survey SET survey_title='".mysqli_real_escape_string($this->db,$survey_title)."',
                survey_description='".mysqli_real_escape_string($this->db,$survey_description)."',
                date_modified='$date_modified'";
            $sql1 .= "WHERE survey_id = '$survey_id'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                
            return $result;
        }

        /*** check existing survey details ***/
        public function get_survey_details_cnt($survey_questions_id) {
    		$sql3="SELECT * FROM survey_details a
                    WHERE a.survey_questions_id = '$survey_questions_id'";
            $check =  $this->db->query($sql3);
            return $count_row = $check->num_rows;
        }

        public function get_survey_cnt($id) {
            $sql="SELECT * FROM survey
                WHERE survey_id='$id'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }

        /*** get survey question count ***/
        public function get_survey_question_cnt($id) {
            $sql="SELECT * FROM survey_questions sq
                LEFT JOIN survey s ON s.survey_id = sq.survey_questions
            WHERE sq.survey_id='$id'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }

        public function get_survey_by_member_id($member_id) {
            $sql="SELECT * FROM survey sq
            WHERE sq.member_id ='$member_id'";
	        $result = mysqli_query($this->db,$sql);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

        public function get_survey_list_by_member_id($member_id) {
            $sql="SELECT * FROM survey_questions sq
            LEFT JOIN survey s ON sq.survey_id = s.survey_id
            WHERE s.member_id ='$member_id'";
	        $result = mysqli_query($this->db,$sql);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

        /*** Add survey questions ***/
        public function add_survey_questions($survey_id,
            $question_array,
            $question_no_array,
            $option1_array,
            $option2_array,
            $option3_array,
            $option4_array,
            $date_created) {

            $ans = array();
            $ans[1] = $option1_array;
            $ans[2] = $option2_array;
            $ans[3] = $option3_array;
            $ans[4] = $option4_array;
           
                $sql1="INSERT INTO survey_questions SET survey_id='$survey_id',question_no = '$question_no_array',survey_questions='".mysqli_real_escape_string($this->db,$question_array)."',
                    date_created='$date_created'";
                $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                $last_id = mysqli_insert_id($this->db);
                if($result) {
                    foreach ($ans as $ansName) {
                        if ($ansName != '') {
                            $sql2="INSERT INTO survey_details SET survey_questions_id='$last_id',options='$ansName'";
                            $result_question = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
                        }
                    }
                }
            return $result;
        }

        public function update_survey_questions($survey_id,
            $survey_questions_id,
            $question_array,
            $option1_array,
            $option2_array,
            $option3_array,
            $option4_array) {

                $ans = array();
                $ans[1] = $option1_array;
                $ans[2] = $option2_array;
                $ans[3] = $option3_array;
                $ans[4] = $option4_array;
           
                $sql1="UPDATE survey_questions SET survey_questions='".mysqli_real_escape_string($this->db,$question_array)."'";
                $sql1.="WHERE survey_id='$survey_id' AND survey_questions_id='$survey_questions_id'";
                $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                if($result) {
                    //Check if there is existing question details
                    $check_survey_dtls = $this->get_survey_details_cnt($survey_questions_id);
                    if($check_survey_dtls > 0) {
                        $delete = $this->delete_survey_details($survey_questions_id);
                        //if($delete) {
                            foreach ($ans as $ansName => $value) {
                                if ($value != '') {
                                    $sql2="INSERT INTO survey_details SET options='$value', survey_questions_id='$survey_questions_id'";
                                    $result_question = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
                                }
                            }
                        //}
                    }
                }
            return $result;
        }

        /*** Enroll a student for survey ***/
        public function enroll_student_survey($survey_id,$student_member_id,$date_created) {
            $sql1="INSERT INTO student_survey SET survey_id='$survey_id',student_member_id='$student_member_id',
                date_created='$date_created'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot update");
            return $result;
        }

        public function get_all_students_survey_list() {
    		$sql3="SELECT * FROM student_survey a
                    LEFT JOIN user_account c on c.member_id = a.student_member_id
                    LEFT JOIN user_additional_information d on d.member_id = c.member_id
                    LEFT JOIN survey e on e.survey_id = a.survey_id
                    AND c.user_type = 'Student'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

         public function unenroll_student_survey($id) {
            $sql2="DELETE FROM student_survey WHERE student_survey_id=$id";
            $result2 = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot be deleted");

            //Student survey answer will also be deleted
            $sql3="DELETE FROM student_survey_answer WHERE student_survey_id=$id";
            $result2 = mysqli_query($this->db,$sql3) or die(mysqli_connect_errno()."Data cannot be deleted");
            return $result2;
        }
	}
?>