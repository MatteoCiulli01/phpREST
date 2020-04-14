<?php
$requestMethod = $_SERVER["REQUEST_METHOD"];
include('./class/Student.php');
$student = new Student();
switch($requestMethod) {
	case 'GET':
		$id = '';	
		if(isset($_GET['id'])) {
            $id = $_GET['id'];
      $student->_id = $id;
			$data = $student->one();
		} else {
			$data = $student->list();
		}
		if(!empty($data)) {
          $js_encode = json_encode(array('status'=>TRUE, 'studentInfo'=>$data), true);
        } else {
          $js_encode = json_encode(array('status'=>FALSE, 'message'=>'There is no record yet.'), true);
        }
		echo $js_encode;
		break;
    
    case 'POST':
      $obj=json_decode(file_get_contents("php://input"),true);
        $student->_name = $obj["nameP"];
        $student->_surname = $obj["surnameP"];
        $student->_sidiCode = $obj["SCP"];
        $student->_taxCode = $obj["TCP"];
        $data = $student->insert();
        if(!empty($data)) {
            $js_encode = json_encode(array('status'=>TRUE, 'studentInfo'=>$data), true);
          } else {
            $js_encode = json_encode(array('status'=>FALSE, 'message'=>'There is no record yet.'), true);
          }
        break;
    case 'DELETE':
        $id = '';	
		$id = $_GET['id'];
		$student->_id = $id;
        $data = $student->delete();

		if(!empty($data)) {
          $js_encode = json_encode(array('status'=>TRUE, 'studentInfo'=>$data), true);
        } else {
          $js_encode = json_encode(array('status'=>FALSE, 'message'=>'There is no record yet.'), true);
        }
        header('Content-Type: application/json');
		echo $js_encode;
        break;
    case ('PATCH' || 'PUT'):
      $obj=json_decode(file_get_contents("php://input"),true);
        $student->_id = $obj["id"];
        $student->_name = $obj["name"];
        $student->_surname = $obj["surname"];
        $student->_sidiCode = $obj["SC"];
        $student->_taxCode = $obj["TC"];
        if($requestMethod == 'PATCH')
        {
          $data = $student->patch();
        }
        else
        {
          $data = $student->put();
        }
          
        
        if(!empty($data)) {
            $js_encode = json_encode(array('status'=>TRUE, 'studentInfo'=>$data), true);
          } else {
            $js_encode = json_encode(array('status'=>FALSE, 'message'=>'There is no record yet.'), true);               // da unire per ottimizzazione
          }
        break;
    default:
	    header("HTTP/1.0 405 Method Not Allowed");
	    break;
}
?>	