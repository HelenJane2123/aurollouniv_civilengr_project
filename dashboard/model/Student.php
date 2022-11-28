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
                exam_status = '0',
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

        public function get_my_exam_details($exam_id) {
    		$sql3="SELECT * FROM exam a
                    LEFT JOIN programs b ON b.program_id = a.program_id
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
                AND exam_status = '0'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }
        /*** get all students with ongoing exam ***/
        public function get_all_students_ongoing($id) {
            $sql="SELECT * FROM students
                WHERE student_member_id='$id'
                AND exam_status = '1'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }
        /*** get all students with completed exam ***/
        public function get_all_students_completed($id) {
            $sql="SELECT * FROM students
                WHERE student_member_id='$id'
                AND exam_status = '2'";
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
        public function getQuestion(){
            $query = "SELECT * FROM exam_details";
	        $result = mysqli_query($this->db,$query);
	        return $user_data = mysqli_fetch_assoc($result);
        }

        /*** get all questions by ques ***/
        public function getQuesByNumber($id){
            $query = "SELECT * FROM exam_details WHERE question_no ='$id'";
	        $result = mysqli_query($this->db,$query);
	        $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
        
        /*** get all questions by ques ***/
        public function getAnswer($id){
            $query = "SELECT * FROM exam_details_answer WHERE question_no ='$id'";
            $getData =  mysqli_query($this->db,$query);
            return $getData;
        }

        public function processData($data){
            $selectedAns            = $data['ans'];
            $number                 = $data['number'];
            $program_name           = $data['program_name'];
            $question_id            = $data['question_id'];
            $exam_cat               = $data['exam_cat'];
            $exam_id                = $data['exam_id'];
            $next                   = $number+1;
    
            if (!isset($_SESSION['score'])) {
                $_SESSION['score'] = '0';
            }
    
            $total = $this->getTotal();
            $right = $this->rightAns($number);

            if ($right == $selectedAns) {
                $_SESSION['score']++;
            }
            if ($number == $total) {
                header("Location:final.php");
                exit();
            }
            else {
                header("location:take_test.php?question_no=$number&program_name=$program_name&exam_cat=$exam_cat&exam_id=$exam_id");
            }
        }

        private function getTotal(){
            $query = "SELECT * FROM exam_details";
            $check =  $this->db->query($query);
            return $count_row = $check->num_rows;

        }

        public function rightAns($number) {
            $query = "SELECT * FROM exam_details_answer WHERE question_no = '$number' AND correct_answer = '1'";
            $result_ = mysqli_query($this->db,$query);
            $question_id = mysqli_fetch_assoc($result_);
            $result = $question_id['exam_details_ans_id'];
            return $result;
        }
	}
?>