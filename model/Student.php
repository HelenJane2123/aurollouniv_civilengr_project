<?php
include "../lib/config.php";
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
            $sql="SELECT * FROM user_account WHERE email_address='$email'";
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
                            date_created='$date_created'";
                $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                return $result;
            }
            else{
                return false;
            }
		}

		/*** for login process ***/
		public function check_login($emailusername, $password){
        	$password = md5($password);
			$sql2="SELECT member_id from user_account WHERE email_address='$emailusername' and password='$password'";

			//checking if the username is available in the table
        	$result = mysqli_query($this->db,$sql2);
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;

	        if ($count_row == 1) {
	            return true;
	        }
	        else{
			    return false;
			}
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

    	/*** starting the session ***/
	    public function get_session(){
	        return $_SESSION['login'];
	    }

	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }

	}
?>