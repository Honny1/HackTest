<?php
   session_start();
   //Destroy session and open login   
   if(session_destroy()) {
      header("Location: index.php");
   }
?>