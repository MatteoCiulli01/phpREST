<?php
/**
 * @package Student class
 *
 * @author 
 *   
 */
 
include("DBConnection.php");
class Student 
{
    protected $db;
    public $_id;
    public $_name;
    public $_surname;
    public $_sidiCode;
    public $_taxCode;
 
    public function __construct() {
        $this->db = new DBConnection();
        $this->db = $this->db->returnConnection();
    }
 
    //insert
    public function insert() {
		try {
			$sql = 'INSERT INTO student (name, surname, sidiCode, taxCode)  VALUES (:name, :surname, :sidiCode, :taxCode)';
			$stmt = $this->db->prepare($sql);
    		$data = [
			    'name' => $this->_name,
			    'surname' => $this->_surname,
			    'sidiCode' => $this->_sidiCode,
			    'taxCode' => $this->_taxCode
			];
	    	$stmt->execute($data);
			$status = $stmt->rowCount();
            return $status;
 
		} catch (Exception $e) {
	
    		die("Oh noes! There's an error in the query!".$e);
		}
 
    }
   
    // getAll 
    public function list() {
    	try {
    		$sql = "SELECT * FROM student";
		    $stmt = $this->db->prepare($sql);
 
		    $stmt->execute();
		    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
		} catch (Exception $e) {
		    die("Oh noes! There's an error in the query!");
		}
    }

    // getOne
    public function one() {
    	try {
    		$sql = "SELECT * FROM student WHERE id=:id";
		    $stmt = $this->db->prepare($sql);
		    $data = [
		    	'id' => $this->_id
			];
		    $stmt->execute($data);
		    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result;
		} catch (Exception $e) {
		    die("Oh noes! There's an error in the query!");
		}
    }
 
    // delete TODO
    public function delete() {
		try {
		$sql = "DELETE FROM student WHERE id=:id";
		$stmt = $this->db->prepare($sql);
		$data = [
			'id' => $this->_id
		];
		$stmt->execute($data);
		return "Operazione eseguita con successo";
		} catch (Exception $e) {
		die("Oh noes! There's an error in the query!");
		}
	}
    // put TODO
    public function put() {
		try {
			$sql = 'UPDATE student SET name = :name, surname = :surname, sidiCode = :sidiCode, taxCode = :taxCode WHERE id = :id';
			echo $sql;
			$stmt = $this->db->prepare($sql);
    		$data = [
				'id' => $this->_id,
			    'name' => $this->_name,
			    'surname' => $this->_surname,
			    'sidiCode' => $this->_sidiCode,
			    'taxCode' => $this->_taxCode
			];

		/*	echo "<ul>";
			foreach($data as $f) {
				echo "<li>$f</li>";
			};
			echo "</ul>";*/ 
			echo var_dump($data);
			$stmt->execute($data);


		} catch (Exception $e) {
	
    		die("Oh noes! There's an error in the query!".$e);
		}
    }
 
    // patch TODO
    public function patch() {
		try {
			$params = "";
			if(!empty($this->_name))
			{
				$params .= "name = :name,"; //$var = $var . "value";
			}
			if(!empty($this->_surname))
			{
				$params .= "surname = :surname,";
			}
			if(!empty($this->_sidiCode))
			{
				$params .= "sidiCode = :sidiCode,";
			}
			if(!empty($this->_taxCode))
			{
				$params .= "taxCode = :taxCode,";
			}
			  
			$params = rtrim($params,","); // The rtrim() function removes whitespace or other predefined characters from the right side of a string
			$sql = "UPDATE student SET ".$params." WHERE id = :id";
			echo $sql;
			$stmt = $this->db->prepare($sql);

			$data = [
				'id' => $this->_id
			];
			if(!empty($this->_name))
			{
				$data += ['name'=> $this->_name];
			}
			if(!empty($this->_surname))
			{
				$data += ['surname'=> $this->_surname] ;
			}
			if(!empty($this->_sidiCode))
			{
				$data += ['sidiCode' =>$this->_sidiCode] ;
			}
			if(!empty($this->_taxCode))
			{
				$data += ['taxCode' => $this->_taxCode];
			}
			echo var_dump($data);

			$stmt->execute($data);
 
		} catch (Exception $e) {
	
    		die("Oh noes! There's an error in the query!".$e);
		}
    }
 
}
?>