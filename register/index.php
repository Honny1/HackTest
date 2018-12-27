<?php

   include(realpath($_SERVER['DOCUMENT_ROOT']).'/controlDatabase/connectDatabase.php');
   $error="";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // user_name, password and email sent from form 
      
      $user_name = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']);
      $email = mysqli_real_escape_string($db,$_POST['email']);  
      
      $sql = "SELECT id FROM user WHERE name = '$user_name'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result not matches $user_name, table row must be 0 row
		
      if($count == 0) {
         $sql = "INSERT INTO user (name,pass,email) VALUES ('$user_name','$password','$email')";
         if ($db->query($sql) === TRUE) {
            header("location: ../index.php");
         } else {
            echo "Error: " . $sql . "<br>" . $db->error;
         }
      }else {
         $error = "Your Login Name is used";
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
      <h1>WELCOME IN REGISTRATION FOR HACK_TEST_2K19</h1>
      <div align = "center">
         <div style = "width:300px; border: solid 1px #000000; " align = "left">
            <div style = "background-color:#000000; color:#FFFFFF; padding:3px;"><b>Register</b></div>
            <div style = "margin:30px">
               <form class="mui-form--inline" action = "" method = "post">
                  <label>UserName:</label><div class="mui-textfield"><input type = "text" name = "username" class = "box" required/></div><br /><br />
                  <label>Password:</label><div class="mui-textfield"><input type = "password" name = "password" class = "box" required/></div><br/><br />
                  <label>Email:</label><div class="mui-textfield"><input type = "text" name = "email" class = "box" required/></div><br/><br />
                  <input class="mui-btn mui-btn--flat" type = "submit" value = "Confirm"/><br />
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>					
            </div>				
         </div>			
      </div>
      <a href="../index.php">LOGIN</a>
      <p>By: Hony</p>
   </body>
</html>
