<!DOCTYPE html>
<html>
<head>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
</style>
</head>
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
			echo "<table id='fresh-table' class='table'>";
			echo "<thead>";
			echo "<th  data-field='name' data-sortable='true'>Name</th>";
			echo "<th  data-field='name' data-sortable='true'>Surname</th>";
			echo "<th  data-field='name' data-sortable='true'>sidiCode</th>";
			echo "<th  data-field='name' data-sortable='true'>taxCode</th>";
			echo "<th  data-field='name' data-sortable='true'>edit</th>";
			echo "</thead>";
			for ($i = 0; $i <= count($result)-1; $i++) {
			echo "<tr>";
			echo "<td>" .$result[$i]["name"]. "</td>";
			echo "<td>" .$result[$i]["surname"]. "</td>";
			echo "<td>" .$result[$i]["sidiCode"]. "</td>";
			echo "<td>" .$result[$i]["taxCode"]. "</td>";
			echo "<td><button onclick='Delete(".$result[$i]['id'].")' class='btn'><i class='fa fa-trash'> Elimina</i> </button></td>";
			echo "<td><button id='MOD' onclick=location.href='Modifica.html' class='btn'><i class='fa fa-pencil'> Modifica</i></button></td>";
			echo "<td><button class='btn'><i class='fa fa-pencil'> Sovrascrivi</i></button></td>";
			echo "</tr>";
			}
			echo "</table>";
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
			echo "<table id='fresh-table' class='table'>";
			echo "<thead>";
			echo "<script src='Funzioni.js'></script>";
			echo "<th  data-field='name' data-sortable='true'>Name</th>";
			echo "<th  data-field='name' data-sortable='true'>Surname</th>";
			echo "<th  data-field='name' data-sortable='true'>sidiCode</th>";
			echo "<th  data-field='name' data-sortable='true'>taxCode</th>";
			echo "<th  data-field='name' data-sortable='true'>edit</th>";
			echo "</thead>";
			echo "<tr>";
			echo "<td>" .$result["name"]. "</td>";
			echo "<td>" .$result["surname"]. "</td>";
			echo "<td>" .$result["sidiCode"]. "</td>";
			echo "<td>" .$result["taxCode"]. "</td>";
			echo "<td><button onclick='Delete(".$result['id'].")' class='btn'><i class='fa fa-trash'> Elimina</i> </button></td>";
			echo "<td><button class='btn'><i class='fa fa-pencil'> Modifica</i></button></td>";
			echo "<td><button class='btn'><i class='fa fa-pencil'> Sovrascrivi</i></button></td>";
			echo "</tr>";
			echo "</table>";
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
<body>
<script>
	function modifica()
	{

    }
	
	$(function () {
    $table.bootstrapTable({
      classes: 'table table-hover table-striped',
      toolbar: '.toolbar',
      
      showColumns: true,
      pagination: true,
      striped: true,
      sortable: true,
      height: $(window).height(),
      pageSize: 25,
      pageList: [25, 50, 100],

      formatShowingRows: function (pageFrom, pageTo, totalRows) {
        return ''
      },
      formatRecordsPerPage: function (pageNumber) {
        return pageNumber + ' rows visible'
      }
    })


    $(window).resize(function () {
      $table.bootstrapTable('resetView', {
        height: $(window).height()
      })
    })
  })
</script>
</body>
</html>