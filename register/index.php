<?php
   include('../controlDatabase/connectDatabase.php');
   $error="";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // user_name, password and email sent from form 
      
      $user_name = $db->real_escape_string($_POST['username']);
      $password = $db->real_escape_string($_POST['password']);
      $email = $db->real_escape_string($_POST['email']);  
      
   
      $sql = "SELECT COUNT( * ) count FROM `user` GROUP BY name HAVING name = '$user_name'";
      $result = $db->query($sql);
      $data = $result->fetch_array();
      $count = $data['count'];

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
      $db->close();
      }
?>
<html>
   
   <head>
      <title>HACK_TEST_2K19</title>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="../css/mui.min.css" rel="stylesheet" type="text/css" />
      <script src="../js/mui.min.js"></script> 
      <link rel="stylesheet" type="text/css" href="../css/style.css">
      <link rel="shortcut icon" type="image/png" href="../images/favicon.png"/>
   </head>
   
   <body>
      <h1>WELCOME TO THE  REGISTRATION FOR HACK_TEST_2K19</h1>
      <div align = "center">
         <div style = "width:300px; border: solid 1px #000000; " align = "left">
            <div style = "background-color:#000000; color:#FFFFFF; padding:3px;"><b>Register</b></div>
            <div style = "margin:30px">
            <p style ="color:#ff0000;"align="center">POZOR!!!<br/> Použij skutečný email a heslo/a které nepoužíváš normálně(neco jako 1234 je  ideál) :D</p>
                <form class="mui-form--inline" action = "" method = "post">
                  <label>UserName:</label><div class="mui-textfield"><input type = "text" name = "username" class = "box" required/></div><br /><br />
                  <label>Password:</label><div class="mui-textfield"><input type = "password" name = "password" class = "box" required/></div><br/><br />
                  <label>Email:</label><div class="mui-textfield"><input type = "email" name = "email" class = "box" required/></div><br/><br />
                  <input class="mui-btn mui-btn--flat" type = "submit" value = "Confirm"/><br />
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>					
            </div>				
         </div>			
      </div>
      <br/> 
      <a href="http://purkiada.sspbrno.cz/Matrix10/">BACK TO /HOME</a>
      <br/>
      <a href="../index.php">LOGIN</a>
      <p>By: Hony</p>
   </body>
</html>
