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
		if (!isset($_SESSION['pass'])){
			return "";
		}else{
			return $_SESSION['pass'];
		}
	}

	public function getUserName(){
		include($_SERVER['DOCUMENT_ROOT']."/controlDatabase/connectDatabase.php");
		$user_check = $_SESSION['login_user'];
		$ses_sql = mysqli_query($db,"select name from user where name = '$user_check' ");
		$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   		$login_user = $row['name'];
   
   		if(!isset($_SESSION['login_user'])){
   			header("location:index.php");
   		}
   		mysqli_close($db);
   		return $login_user;
	}
	
	public function isUserLogin(){
		if(!isset($_SESSION['login_user'])){
   			header("location:index.php");
   		}
	}
}
?>