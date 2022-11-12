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
            $check =  $this->isProgramIDExist($id);
            if (!$check){
                $sql1="INSERT INTO programs SET program_name='$program_name',member_id='$member_id',short_desc='$short_desc', 
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
            }
            else{
                return false;
            }
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

        /*** get program info by progtram id ***/
        public function get_program_by_id($id){
            $sql3="SELECT * FROM programs a 
                LEFT JOIN 	program_additioonal_info b ON b.program_id = a.program_id
                WHERE a.program_id = '$id'";
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
    		$sql3="SELECT user_type FROM user_account WHERE email_address = '$email_address' AND user_type='Professor'";
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

        /*** for showing the List of Exam Category ***/
    	public function get_all_exam_cat_list($member_id){
    		$sql3="SELECT * FROM exam_category a
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
	}
?>