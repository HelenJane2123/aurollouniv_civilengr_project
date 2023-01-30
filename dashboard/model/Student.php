<?php
    include_once ("../lib/config.php");
	class Student{
		public $db;
		public function __construct(){
			$this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;
			}
		}
		/*** get admin profile info ***/
        public function get_student_info($email_address){
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
                        b.course,
                        b.section,
						b.class,
						a.id
                FROM user_account a 
                LEFT JOIN user_additional_information b ON b.member_id = a.member_id
                WHERE a.email_address = '$email_address' AND user_type='Student'";
	        $result = mysqli_query($this->db,$sql3);
	        return $user_data = mysqli_fetch_assoc($result);
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

		/*** get member id ***/
        public function get_memberid($member_id) {
            $sql3="SELECT member_id
                FROM user_account 
                WHERE member_id = '$member_id' AND user_type='Student'";
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
                $class,
                $section,
				$course,
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
                    WHERE member_id = '$member_id' AND user_type='Student'";
            //Check if there is existing account id in user_additional_information table
            $check_if_exists =  $this->get_memberid_additional_info($member_id);
            if($check_if_exists) {
                //If exists update info
                $sql2="UPDATE user_additional_information SET academic_year='$academic_year',class='$class', 
                            section='$section', course='$course' WHERE member_id = '$member_id'";
                $result1 = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot be updated");
            }
            else {
                //insert new record
                $sql2="INSERT INTO user_additional_information SET member_id='$member_id', academic_year='$academic_year',class='$class', 
                            section='$section', course='$course'";
                $result1 = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
            }
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be updated");
            return $result;
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

		/*** get member id from additional info ***/
		public function get_all_programs() {
    		$sql3="SELECT * FROM programs";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

		/*** get program member by id ***/
        public function get_program_member_id($id){
            $sql3="SELECT member_id FROM programs a 
                WHERE a.program_id = '$id'";
            $result = mysqli_query($this->db,$sql3);
            return $user_data = mysqli_fetch_assoc($result);
        }

		/*** get program by id ***/
        public function get_program_details_by_id($id){
            $sql3="SELECT * FROM programs a 
				LEFT JOIN program_additioonal_info c on c.program_id = a.program_id
                WHERE a.program_id = '$id'";
            $result = mysqli_query($this->db,$sql3);
            return $user_data = mysqli_fetch_assoc($result);
        }

		/*** Enroll a student ***/
        public function enroll_program($account_id,$get_program_member_id,$student_member_id,$program_id,$date_modified) {
            $sql1="INSERT INTO students SET account_id='$account_id',member_id='$get_program_member_id',
                student_member_id = '$student_member_id',
                program_id = '$program_id',
                stud_exam_status = '0',
                date_modified='$date_modified'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot update");
            return $result;
        }

		public function get_all_program_list($account_id) {
    		$sql3="SELECT * FROM students a
                    LEFT JOIN programs b on b.program_id = a.program_id
                    LEFT JOIN program_additioonal_info c on c.program_id = a.program_id
                    WHERE a.account_id = '$account_id'
                    AND unenroll_student = '0'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

		public function get_my_exam($account_id) {
    		$sql3="SELECT * FROM students a
                    LEFT JOIN programs b on b.program_id = a.program_id
					LEFT JOIN exam c on b.program_id = c.program_id
                    WHERE a.account_id = '$account_id'
                    AND unenroll_student = '0'
					AND b.with_exam = '1'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

        public function get_my_survey($account_id) {
    		$sql3="SELECT * FROM student_survey a
                    LEFT JOIN survey b on b.survey_id = a.survey_id
                    WHERE a.student_member_id = '$account_id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

        public function get_student_by_survey_id($survey_id) {
    		$sql3="SELECT * FROM student_survey a
                    WHERE a.survey_id = '$survey_id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

        public function get_my_exam_details($exam_id) {
    		$sql3="SELECT * FROM exam a
                    LEFT JOIN programs b ON b.program_id = a.program_id
                    LEFT JOIN exam_details c ON c.exam_id = a.exam_id
                    WHERE a.exam_id = '$exam_id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $user_data = mysqli_fetch_assoc($result);
        }

        public function get_my_survey_details($survey_id,$student_survey_id) {
    		$sql3="SELECT * FROM survey a
                    LEFT JOIN survey_questions b ON a.survey_id = b.survey_id
                    LEFT JOIN student_survey c ON c.survey_id = b.survey_id
                    WHERE a.survey_id = $survey_id AND c.student_survey_id = '$student_survey_id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $user_data = mysqli_fetch_assoc($result);
        }

        public function get_my_survey_by_id($survey_id) {
    		$sql3="SELECT * FROM survey a
                    LEFT JOIN survey_questions b ON a.survey_id = b.survey_id
                    LEFT JOIN student_survey c ON c.survey_id = b.survey_id
                    WHERE a.survey_id = $survey_id";
	        $result = mysqli_query($this->db,$sql3);
	        return $user_data = mysqli_fetch_assoc($result);
        }

        public function get_my_exam_essay($exam_id) {
    		$sql3="SELECT * FROM exam_essay a
                    WHERE a.exam_id = '$exam_id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $user_data = mysqli_fetch_assoc($result);

        }
		/*** unenroll student ***/
        public function unenroll_program($id) {
            $sql1="DELETE FROM students 
                    WHERE student_id='$id'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot updated");
            return $result;
        }

		/*** get all students with not yet started ***/
        public function get_all_students_not_started($id) {
            $sql="SELECT * FROM students
                WHERE student_member_id='$id'
                AND stud_exam_status = '0'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }
        /*** get all students with ongoing exam ***/
        public function get_all_students_ongoing($id) {
            $sql="SELECT * FROM students
                WHERE student_member_id='$id'
                AND stud_exam_status = '1'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }
        /*** get all students with completed exam ***/
        public function get_all_students_completed($id) {
            $sql="SELECT * FROM students
                WHERE student_member_id='$id'
                AND stud_exam_status = '2'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }

		 /*** get all lessons ***/
		 public function get_all_lessons($id) {
            $sql="SELECT * FROM students
                WHERE student_member_id='$id'
                AND unenroll_student = '0'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }

        /*** get all questions ***/
        public function getQuestion($exam_id){
            $query = "SELECT * FROM exam_details
                    WHERE exam_id = '$exam_id'";
	        $result = mysqli_query($this->db,$query);
	        return $user_data = mysqli_fetch_assoc($result);
        }

        /*** get all questions by ques ***/
        public function getQuesByNumber($id, $exam_id){
            $query = "SELECT * FROM exam_details WHERE question_no ='$id'
                    AND exam_id = '$exam_id'";
	        $result = mysqli_query($this->db,$query);
	        $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }

        public function getSurveyByNumber($survey_id, $question_no){
            $query = "SELECT * FROM survey_questions WHERE survey_id ='$survey_id' AND question_no='$question_no'";
	        $result = mysqli_query($this->db,$query);
	        $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
        
        /*** get all questions by ques ***/
        public function getAnswer($id, $exam_id){
            $query = "SELECT * FROM exam_details_answer a
                    LEFT JOIN exam_details b ON a.exam_details_id = b.exam_details_id
                WHERE a.question_no ='$id' AND b.exam_id='$exam_id'";
            $getData =  mysqli_query($this->db,$query);
            return $getData;
        }

        public function getSurveyOptions($id,$survey_id){
            $query = "SELECT * FROM survey_questions a
                    LEFT JOIN survey_details b ON a.survey_questions_id = b.survey_questions_id
                WHERE a.question_no='$id' AND a.survey_id = '$survey_id'";
            $getData =  mysqli_query($this->db,$query);
            return $getData;
        }
        


        /*** process multiple choice answers ***/
        public function processData($data){
            $selectedAns            = $data['ans'];
            $number                 = $data['number'];
            $program_name           = $data['program_name'];
            $question_id            = $data['question_id'];
            $exam_cat               = $data['exam_cat'];
            $exam_id                = $data['exam_id'];
            $exam_details_id        = $data['exam_details_id'];
            $student_id             = $data['student_id'];
            $next                   = $number+1;
            $next_                  = $exam_details_id+1;

            $total = $this->getTotal($exam_id);
            $right = $this->rightAns($number,$exam_details_id);

            for($i=0;$i<count($data['ans']);$i++){
                $exam_id                    = $data['exam_id'];
                $student_id                 = $data['student_id'];
                $exam_details_ans_id        = $data['exam_details_ans_id'][$i];
                $user_answer                = $data['ans'][$i];
                $exam_taken                 = date("Y-m-d h:i:s");
                
                $this->update_saved_answers($student_id,$exam_id,$exam_details_ans_id);
                $this->save_student_answers($exam_id,$student_id,$exam_details_ans_id,$user_answer,$exam_taken);
            }
            
            if ($number == $total) {
                header('Location:final.php?program_name='.$program_name.'&exam_cat='.$exam_cat.'&exam_id='.$exam_id.'&student_id='.$student_id);
                exit();
            }
            else {
                header('Location: ' . $_SERVER['PHP_SELF'] . '?exam_details_id=' .$next_.'&question_no=' .$next.'&program_name='.$program_name.'&exam_cat='.$exam_cat.'&exam_id='.$exam_id.'&student_id='.$student_id);
            }
        }

        /*** process survey ***/
        public function processSurveyData($data){
            $selectedAns            = $data['ans'];
            $survey_question        = $data['survey_questions_id'];
            $number                 = $data['number'];
            $next                   = $number+1;
            $survey_id              = $data['survey_id'];
            $student_id             = $data['student_id'];
            $survey_details_id      = $data['survey_details_id'];
            

            $total = $this->getSurveyTotal($survey_id);
            for($i=0;$i<count($data['ans']);$i++){
                $survey_questions_id        = $survey_question[$i];
                $user_answer                = $selectedAns[$i];
                $student_survey_id          = $student_id;
                
                $this->save_student_survey_answers($student_survey_id,$survey_questions_id,$user_answer,$survey_id,$survey_details_id);
            }
            
            if ($number == $total) {
                header('Location:final_survey.php?survey_id=' .$survey_id.'&student_id='.$student_id.'&question_no='.$next);
                exit();
            }
            else {
                header('Location: ' . $_SERVER['PHP_SELF'] . '?survey_id=' .$survey_id.'&student_id='.$student_id.'&question_no='.$next);
            }
        }

        /*** process essay answers ***/
        public function processEssayData($data){
            $exam_id                = $data['exam_id'];
            $student_id             = $data['student_id'];
            $exam_essay_id          = $data['exam_essay_id'];
            $student_answer         = $data['student_answer'];

            $essay_answer = $this->save_student_essay_answer($exam_id,$student_id,$exam_essay_id,$student_answer);
    
            if ($essay_answer) {
                header('Location:final.php?program_name='.$program_name.'&exam_cat='.$exam_cat.'&exam_id='.$exam_id.'&student_id='.$student_id);
                $_SESSION['message_success'] = "Congratulatons! You have successfully submitted your answer."; 
                exit();
            }
            else {
                header('Location:final.php?program_name='.$program_name.'&exam_cat='.$exam_cat.'&exam_id='.$exam_id.'&student_id='.$student_id);
                $_SESSION['message_error'] = "An error has occurred. Please try again later."; 
            }
        }

        private function getTotal($exam_id){
            $query = "SELECT * FROM exam_details WHERE exam_id = '$exam_id'";
            $check =  $this->db->query($query);
            return $count_row = $check->num_rows;
        }

        private function getSurveyTotal($survey_id){
            $query = "SELECT * FROM survey_questions WHERE survey_id = '$survey_id'";
            $check =  $this->db->query($query);
            return $count_row = $check->num_rows;
        }

        public function rightAns($number,$exam_details_id) {
            $query = "SELECT * FROM exam_details_answer a 
                WHERE a.question_no = '$number'
                AND a.exam_details_id = '$exam_details_id'
                AND a.correct_answer = '1'
                GROUP BY a.question_no";
            $result_ = mysqli_query($this->db,$query);
            $question_id = mysqli_fetch_assoc($result_);
            $result = $question_id['exam_details_id'];
            return $result;
        }

        public function getQueByOrder($exam_id){
            $query = "SELECT * FROM exam_details WHERE exam_id ='$exam_id'";
            $getData =  mysqli_query($this->db,$query);
            return $getData;
        }

		/*** update student exams ***/
        public function update_student_exam($score,$score_status,$student_id,$date_modified) {
            $sql1="UPDATE students SET stud_exam_status=2,exam_score='$score', 
                            score_status='$score_status', 
                            date_modified='$date_modified'
                    WHERE student_id = '$student_id' AND unenroll_student=0";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be updated");
            return $result;
        }

        public function get_my_score($account_id) {
    		$sql3="SELECT * FROM students a
                    WHERE a.student_id = '$account_id'
                    AND unenroll_student = '0'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_assoc($result);
        }

        /*** get program by id ***/
        public function get_exam_details_by_student_id($student_id){
            $sql3="SELECT * FROM students a 
                LEFT JOIN programs c on c.program_id = a.program_id
                LEFT JOIN exam b on b.program_id = c.program_id
                WHERE a.student_id = '$student_id'";
            $result = mysqli_query($this->db,$sql3);
            return $user_data = mysqli_fetch_assoc($result);
        }

        public function save_student_answers($exam_id,$student_id,$exam_details_ans_id,$user_answer,$exam_taken) {
            //insert new data
            $sql1="INSERT INTO student_answers SET exam_id='$exam_id',student_id='$student_id',
                exam_details_ans_id = '$exam_details_ans_id',
                status = 'new',
                answer = '$user_answer',
                exam_taken = '$exam_taken'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot update");
            return $result;
        }

        public function update_saved_answers($student_id,$exam_id,$exam_details_ans_id) {
            $sql1="UPDATE student_answers SET 
                            status='old'
                    WHERE student_id = '$student_id' AND exam_id = '$exam_id'
                    AND exam_details_ans_id = '$exam_details_ans_id'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be updated");
            return $result;
        }

        private function save_student_survey_answers($student_survey_id,$survey_questions_id,$user_answer,$survey_id,$survey_details_id) {
            //insert new data
            $sql1="INSERT INTO student_survey_answer SET student_survey_id='$student_survey_id',survey_questions_id='$survey_questions_id',
                answers = '$user_answer', survey_details_id = '$survey_details_id'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot insert");

            if($sql1) {
                $sql2="UPDATE student_survey SET survey_status= 1 WHERE survey_id = '$survey_id'";
                $result1 = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot update");
            }
            return $result;
        }

        public function check_exisitng_exam($exam_id,$student_id){
            $sql="SELECT * FROM student_answers WHERE exam_id='$exam_id' AND student_id = '$student_id'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }



        public function save_student_essay_answer($exam_id,$student_id,$exam_essay_id,$student_answer) {
            $date_modified               = date("Y-m-d h:i:s");
            $sql1="INSERT INTO student_essay_answer SET exam_id = '$exam_id',
                    exam_essay_id='$exam_essay_id',
                    student_id='$student_id',
                    student_answer = '".mysqli_real_escape_string($this->db,$student_answer)."'";

            if($sql1) {
                //Update exam status to completed
                $sql2="UPDATE students SET stud_exam_status=2,
                                date_modified='$date_modified'
                        WHERE student_id = '$student_id' AND unenroll_student=0";
                $result2 = mysqli_query($this->db,$sql2);            
            }
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot update");
            return $result;
        }

        public function get_student_answer($exam_id, $student_id) {
    		$sql3="SELECT * FROM exam_details_answer a
                    INNER JOIN student_answers b on b.exam_details_ans_id = a.exam_details_ans_id
                    WHERE a.exam_id = '$exam_id'
                    AND student_id = '$student_id'";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

        public function get_student_score($exam_id,$student_id){
    		$sql3="SELECT * FROM exam_details_answer a
                    INNER JOIN student_answers b on b.exam_details_ans_id = a.exam_details_ans_id
                    WHERE b.exam_id = '$exam_id'
                    AND b.student_id = '$student_id'
                    AND b.status = 'new'
                    AND b.answer = '1'
                    ORDER BY b.exam_taken DESC";
            $check =  $this->db->query($sql3);
            return $count_row = $check->num_rows;
        }

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

        public function get_student_retake($student_id) {
            $query = "SELECT * FROM students a 
                WHERE a.student_id = '$student_id'";
            $result_ = mysqli_query($this->db,$query);
            $question_id = mysqli_fetch_assoc($result_);
            $result = $question_id['exam_attempt'];
            return $result;
        }

        /*** update student exams ***/
        public function updateRetakes($student_id,$retake) {
            $date_modified          =  date("Y-m-d h:i:s");
            $next_count             = $retake+1;
            $sql1="UPDATE students SET
                            exam_attempt='$next_count', 
                            date_modified='$date_modified'
                    WHERE student_id = '$student_id'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be updated");
            return $result;
        }

        /*** Get Student Details ***/
        public function get_student_essay_exam_id($student_id,$exam_id) {
            $sql3="SELECT * FROM exam_essay a
                    INNER JOIN exam b ON b.exam_id = a.exam_id
                    INNER JOIN students c ON c.program_id = b.program_id
                    INNER JOIN student_essay_answer d ON a.exam_essay_id = d.exam_essay_id
                    WHERE c.student_id = '$student_id'
                    AND b.exam_id = '$exam_id'";
            $result = mysqli_query($this->db,$sql3);
            return $user_data = mysqli_fetch_assoc($result);
        }

        public function getStudentAnswer($question, $exam_id) {
            $query = "SELECT * FROM exam_details_answer a
                    INNER JOIN student_answers  b ON a.exam_details_ans_id = b.exam_details_ans_id
                    INNER JOIN exam_details c ON a.exam_details_id = c.exam_details_id
                WHERE a.question_no ='$question' AND b.exam_id='$exam_id'";
            $getData =  mysqli_query($this->db,$query);
            return $getData;

            
        }

        public function get_exam_limit($exam_id) {
            $sql3="SELECT * FROM exam a
            WHERE a.exam_id = '$exam_id'";
            $result = mysqli_query($this->db,$sql3);
            return $user_data = mysqli_fetch_assoc($result);
        }
	}
?>