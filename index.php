<?php
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);
	//This part control Leves by name levels and save user progress to db
	include_once('./sessions/Session.class.php');
	include('./controlDatabase/controlDatabase.php');
  $session = new Session();
	$session->setLog(False);
    
	if(!isset($_SESSION['pass']) && empty($_SESSION['pass'])){
		$session->setLog(True);
	}

	if(isset($_GET['pass']) && !empty($_GET['pass'])){
		if(file_exists("./levels/".$_GET['pass'].".php")and $session->isUserLogin()){	
				
			saveLevel($session->getUserName(),$_GET['pass']);
			$session->setLevel($_GET['pass']);
			include("./levels/" . $session->getLevel() . ".php");
        }else{            
			if ($session->getLog()) {
				include_once("./login/index.php");
				$session->setLog(False);
			}else{
				include("./levels/" . $session->getLevel() . ".php");
			}
		}
	}else{
		if ($session->getLog()) {
			include_once("./login/index.php");
            $session->setLog(False);
		}else{
			include("./levels/" . $session->getLevel() . ".php");
		}
	}
?>
