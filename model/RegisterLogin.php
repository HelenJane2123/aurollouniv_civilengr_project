<?php
	require_once ("../lib/config.php");
	class User{
		public $db;
		public function __construct(){
			$this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;
			}
		}
        /*** check if user exist ***/
        public function isUserExist($email){
            $sql="SELECT * FROM user_account WHERE email_address='$email' AND is_approved = '1'";
            $check =  $this->db->query($sql);
            $count_row = $check->num_rows;
            if($count_row == 0) {
                return false;
            }
            else {
                return true;
            }
        }
		/*** for registration process ***/
		public function reg_user($member_id,$email_address, $first_name, $last_name, $mobile_number, $user_type, $password_1, $date_created){
			$password = md5($password_1);
            $check =  $this->isUserExist($email_address);
            if (!$check){
                $sql1="INSERT INTO user_account SET member_id='$member_id',email_address='$email_address', 
                            firstname='$first_name', 
                            last_name='$last_name', 
                            phone_number='$mobile_number',
                            user_type='$user_type',
                            password='$password_1',
							is_approved = '0',
                            date_created='$date_created'";
                $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                return $result;
            }
            else{
                return false;
            }
		}

		/*** for login process ***/
		public function check_login($emailusername){
        	$password = md5($password);
			$sql2="SELECT * from user_account WHERE email_address='$emailusername' and is_approved = '1'";

			//checking if the username is available in the table
			$check =  $this->db->query($sql2);
        	// $result = mysqli_query($this->db,$sql2);
        	// $user_data = mysqli_fetch_array($result);
        	return $count_row = $check->num_rows;
	        // if ($count_row == 1) {
	        //     return true;
	        // }
	        // else{
			//     return false;
			// }
    	}

    	/*** starting the session ***/
	    public function get_session(){
	        return $_SESSION['login'];
	    }

	}
?>