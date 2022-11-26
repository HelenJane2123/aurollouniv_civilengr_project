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
	}
?>