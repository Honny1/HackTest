<?php
	//This part control Leves by name levels and save user progress to db
	include_once($_SERVER['DOCUMENT_ROOT']."/sessions/Session.class.php");
	include($_SERVER['DOCUMENT_ROOT']."/controlDatabase/controlDatabase.php");
	include($_SERVER['DOCUMENT_ROOT']."/sessions/session.php");
	
	
	if($session->getLevel()!="L0") {
		if(!isset($_SESSION['pass'])){
			//saveLevel($session->getUserName(),"login");
			include("./login/index.php");
		}
	}else{
		if(isset($_GET['pass']) && !empty($_GET['pass'])){
			if(file_exists("./levels/".$_GET['pass'].".php")){	
				
				saveLevel($session->getUserName(),$_GET['pass']);
				$session->setLevel($_GET['pass']);
				include("./levels/" . $session->getLevel() . ".php");
			}else{                   
				include("./levels/" . $session->getLevel() . ".php");
			}
		}else{
			include("./levels/" . $session->getLevel() . ".php");
		}
	}
?>