<!-- crud= create, read, update and delete. -->
<?php
class crud
{
	//private database object
	private $db;
	//constructor to initialize private variable to the database connection
	function __construct($conn)
	{
		$this->db = $conn;
	}
	//function to insert a new record into the attendee database
	public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty)//parameter
	{ 
		try {
			//define sql statement to be executed
			$sql = "INSERT INTO attendee (firstName,lastName,dateOfBirth,emailAddress,contact,specialty_id) VALUES (:fname,:lname,:dob,:email,:contact,:specialty)"; //placeholder
			//prpare the sql statement for execution
			$stmt = $this->db->prepare($sql);
			//binding all placeholder with parameter(actual values)
			$stmt->bindparam(':fname', $fname);
			$stmt->bindparam(':lname', $lname);
			$stmt->bindparam(':dob', $dob);
			$stmt->bindparam(':email', $email);
			$stmt->bindparam(':contact', $contact);
			$stmt->bindparam(':specialty', $specialty);
			//execute
			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	public function editAttendees($id,$fname, $lname, $dob, $email, $contact, $specialty){
		try{
		$sql="UPDATE `attendee` SET firstName=:fname,lastName=:lname,dateOfBirth=:dob,emailAddress=:email,contact=:contact,specialty_id=:specialty WHERE index_id=:id";
		//define sql statement to be executed
		$stmt = $this->db->prepare($sql);
		//binding all placeholder with parameter(actual values)
		 $stmt->bindparam(':id', $id);
		 $stmt->bindparam(':fname', $fname);
		$stmt->bindparam(':lname', $lname);
		$stmt->bindparam(':dob', $dob);
		$stmt->bindparam(':email', $email);
		 $stmt->bindparam(':contact', $contact);
		 $stmt->bindparam(':specialty', $specialty);
		//execute
		$stmt->execute();
		return true;
		}catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}

	}
	public function getAttendees(){
		try{
		$sql= "SELECT * FROM `attendee`a inner join specialties s on a.specialty_id=s.specialty_id";
		$result= $this->db->query($sql);
		return $result;
		}catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}

	}
	public function getAttendeeDetails($id){
		try{
		$sql="select * from attendee a inner join specialties s on a.specialty_id=s.specialty_id where index_id =:id";
		$stmt=$this->db->prepare($sql);
		$stmt->bindparam(':id',$id);
		$stmt->execute();
		$result=$stmt->fetch();
		return $result;
		}catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}

	}
	public function deleteAttendee($id){
		try{
			$sql="delete from attendee where index_id=:id";
			$stmt=$this->db->prepare($sql);
		$stmt->bindparam(':id',$id);
		$stmt->execute();
		
		return true;
		}catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}

	}
	public function getSpecialty(){
		try{
		$sql= "SELECT * FROM `specialties`";
		$result= $this->db->query($sql);
		return $result;
		}catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	public function getSpecialtyById($id){
		try{
		    $sql = "SELECT * FROM `specialties` where specialty_id = :id";
		    $stmt = $this->db->prepare($sql);
		    $stmt->bindparam(':id', $id);
		    $stmt->execute();
		    $result = $stmt->fetch();
		    return $result;
		}catch (PDOException $e) {
		    echo $e->getMessage();
		    return false;
		}
		
	    }
}
?>