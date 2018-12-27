<?php
	//This part control Leves by name levels and save user progress to db
	include_once(realpath($_SERVER['DOCUMENT_ROOT']).'/sessions/Session.class.php');
	include(realpath($_SERVER['DOCUMENT_ROOT']).'/controlDatabase/controlDatabase.php');
    
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
