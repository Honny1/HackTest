<?php

class Session {

	public function __construct() {
		if (session_status() == PHP_SESSION_NONE) {
    		session_start();
		}
	}
	
	public function setLevel($value) {
		$_SESSION['pass'] = $value;
	}
	
	public function getLevel() {
		return $_SESSION['pass'];
	}

	public function setLog($value) {
		$_SESSION['log'] = $value;
	}
	
	public function getLog() {
		return $_SESSION['log'];	
	}

	public function getUserName(){
		include($_SERVER['DOCUMENT_ROOT']."/controlDatabase/connectDatabase.php");
        $idUser = $_SESSION['login_user'];
        $query = "SELECT iduser FROM user WHERE iduser ='$idUser'";
        $result = $db->query($query);
        $userId= mysqli_fetch_array($result);
        
   
   		if(!isset($_SESSION['login_user'])){
   			header("location:index.php");
   		}
   		mysqli_close($db);
   		return $userId['iduser'];
	}
	
	public function isUserLogin(){
		if(!isset($_SESSION['login_user'])){
   			return False;
   		}else{
   			return True;
   		}
	}
}
?>
