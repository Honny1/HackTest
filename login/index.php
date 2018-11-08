<?php

   include($_SERVER['DOCUMENT_ROOT']."/controlDatabase/connectDatabase.php");
   include_once($_SERVER['DOCUMENT_ROOT']."/sessions/Session.class.php");
   include($_SERVER['DOCUMENT_ROOT']."/sessions/session.php");
   $error="";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $user_name = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM user WHERE name = '$user_name' and pass = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $user_name and $password, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $user_name;
         $session->setLevel("L0");
         header("location: ../index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
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
      <link rel="stylesheet" type="text/css" href="/style.css">  
   </head>
   
   <body>
      <h1>WELCOME IN HACK_TEST_2K19</h1>
      <div align = "center">
         <div style = "width:300px; border: solid 1px #000000; " align = "left">
            <div style = "background-color:#000000; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            <div style = "margin:30px">
               <form class="mui-form--inline" action = "" method = "post">
                  <label>UserName:</label><div class="mui-textfield"><input type = "text" name = "username" class = "box" required/></div><br /><br />
                  <label>Password:</label><div class="mui-textfield"><input type = "password" name = "password" class = "box" required/></div><br/><br />
                  <input class="mui-btn mui-btn--flat" type = "submit" value = "Confirm"/><br />
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </div>				
         </div>
      </div>
      <a href="/register/index.php">REGISTER</a>
      <p>By: Jan Rodák</p>
   </body>
</html>