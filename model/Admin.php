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
		public function add_new_program($program_name,$short_desc,$with_exam,$fileName_program,$move_file_image,$date_created,$created_by){
            $check =  $this->isProgramExist($program_name);
            if (!$check){
                $sql1="INSERT INTO programs SET program_name='$program_name',short_desc='$short_desc', 
                            with_exam='$with_exam', 
                            upload_program_lesson='$fileName_program', 
                            upload_image='$move_file_image',
                            date_created='$date_created',
							created_by='$created_by'";
                $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                return $result;
            }
            else{
                return false;
            }
		}

    	/*** for showing the List of Porgrams ***/
    	public function get_program_list($email_address){
    		$sql3="SELECT CONCAT_WS(' ', firstname, last_name) as fullname FROM user_account WHERE email_address = '$email_address'";
	        $result = mysqli_query($this->db,$sql3);
	        $user_data = mysqli_fetch_array($result);
	        return $user_data['fullname'];
    	}

		 /*** check if program already exist ***/
        public function isProgramExist($program_name){
            $sql="SELECT * FROM programs WHERE program_name='$program_name'";
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
                            date_created='$date_created',
							created_by='$created_by'";
                $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                return $result;
            }
            else{
                return false;
            }
		}

        /*** get admin profile info ***/
        public function get_admin_info($email_address){
    		$sql3="SELECT CONCAT_WS(' ', a.firstname, a.last_name) as fullname, a.firstname, a.last_name, a.member_id, 
                        a.email_address, 
                        a.phone_number,
                        b.academic_year,
                        b.teaching_class,
                        b.section
                FROM user_account a 
                LEFT JOIN user_additional_information b ON b.member_id = a.member_id
                WHERE a.email_address = '$email_address'";
	        $result = mysqli_query($this->db,$sql3);
	        return $user_data = mysqli_fetch_assoc($result);
    	}
	}
?>