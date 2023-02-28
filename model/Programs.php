<?php
	include_once ('lib/config.php');
	class Programs {
		public $db;
		public function __construct(){
			$this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;
			}
		}
                /*** for showing the List of Porgrams ***/
    	public function get_all_programs(){
    		$sql3="SELECT * FROM programs a
                    LEFT JOIN program_additioonal_info b ON a.program_id = b.program_id";
	        $result = mysqli_query($this->db,$sql3);
	        return $result_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    	}

		/*** get all enrolled students ***/
		public function get_all_students_count_program_id($program_id) {
            $sql="SELECT * FROM students WHERE program_id='$program_id' AND unenroll_student = '0'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }

		 /*** check if user exist ***/
		 public function isUserExist($email){
            $sql="SELECT * FROM user_account WHERE email_address='$email' AND is_approved = '1'";
            $check =  $this->db->query($sql);
            return $count_row = $check->num_rows;
        }

		public function inserttopasswordreset($email,$key,$expDate){
			$result = mysqli_query($this->db, "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");;
			return $result;
		}

		public function get_pw_reset_tmp_cnt($key,$email){
			$query = mysqli_query($this->db, "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "';");
			return $row = mysqli_num_rows($query);
		}

		public function get_pw_reset_tmp($key,$email){
			$query = mysqli_query($this->db, "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "';");
			return $row = mysqli_fetch_assoc($query);
		}

		public function update_password($pass1,$curDate,$email){
			$query = mysqli_query($this->db, "UPDATE `user_account` SET `password` = '" . $pass1 . "', `date_updated` = '" . $curDate . "' WHERE `email_address` = '" . $email . "'");
			return $query;
		}

		public function delete_pw_tmp($email) {
			$query = mysqli_query($this->db, "DELETE FROM `password_reset_temp` WHERE `email` = '$email'");
			return $query;
		}
	}
?>