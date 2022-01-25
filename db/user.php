<?php
class user
{
	//private db object
	private $db;
	//constructor to initilize privte constructor to database
	function __construct($conn)
	{
		$this->db = $conn;
	}
	public function insertuser($username, $password)
	{
		try {
			$result=$this->getuserbyusername($username);
			if($result['num']>0){
				return false;
			}else{
				$new_password=md5($password.$username);
			//define sql statement to be executed
			$sql = "INSERT INTO users (username,password) VALUES (:username,:password)"; //placeholder
			//prepare the sql statement for execution
			$stmt = $this->db->prepare($sql);
			//binding all placeholder with parameter(actual values)
			$stmt->bindparam(':username', $username);
			$stmt->bindparam(':password', $new_password);
			//execute
			$stmt->execute();
			return true;
		 	}
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	public function getuser($username, $password)
	{
		try {
			$sql = "select * from users where username= :username AND password= :password";
			$stmt = $this->db->prepare($sql);
			$stmt->bindparam(':username', $username);
			$stmt->bindparam(':password', $password);
			$stmt->execute();
			$result = $stmt->fetch(); //fetching
			return $result;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	public function getuserbyusername($username)
	{
		try {
			$sql = "select count(*) as num from users where username=:username";
			$stmt = $this->db->prepare($sql);
			$stmt->bindparam(':username', $username);
			$stmt->execute();
			$result = $stmt->fetch(); //fetching
			return $result;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

}
?>
