<?php

   include(realpath($_SERVER['DOCUMENT_ROOT']).'/controlDatabase/connectDatabase.php');
   include_once(realpath($_SERVER['DOCUMENT_ROOT']).'/sessions/Session.class.php');
   require('sendEmail.php');
   $error="";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") { 
        
      $newEmail = mysqli_real_escape_string($db,$_POST['newEmail']); 
      $sql = "SELECT id FROM user WHERE email = '$newEmail'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result not matches $user_name, table row must be 0 row
      $name = $_GET['user'];
     
      if($count == 0) {
          $sql = "INSERT INTO newEmail (user_iduser,newEmail) VALUES ('$name','$newEmail')";
          sendEmail($newEmail);
          if ($db->query($sql) === TRUE) {
            $error="Email was send!";
         } else {
            $error= "Error: " . $sql . "<br>" . $db->error;
         }
      }else {
         $error = "Your email is used";
         }
      mysqli_close($db);
      }
   
?>
<html>
   
   <head>
      <title>HACK_TEST_2K19</title>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//cdn.muicss.com/mui-0.9.41/css/mui.min.css" rel="stylesheet" type="text/css" />
      <script src="//cdn.muicss.com/mui-0.9.41/js/mui.min.js"></script> 
      <link rel="stylesheet" type="text/css" href="../css/style.css">  
   </head>
   
   <body>
      <h1>WELCOME IN HACK_TEST_2K19</h1>
      <div align = "center" style = "background-color:">
         <div style = "width:300px; border: solid 1px #000000; " align = "left">
            <div style = "background-color:#000000; color:#FFFFFF; padding:3px;"><b>New Email</b></div>
            <div style = "margin:30px">
               <form class="mui-form--inline" action = "" method = "post">
                  <label>newEmail:</label><div class="mui-textfield"><input type = "text" name = "newEmail" class = "box" required/></div><br /><br />
                  <input class="mui-btn mui-btn--flat" type = "submit" value = "Confirm"/><br />
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </div>				
         </div>
      </div>
      <p>By: Jan Rodák</p>
   </body>
</html>
