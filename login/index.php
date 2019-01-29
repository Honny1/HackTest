<?php

   include(realpath($_SERVER['DOCUMENT_ROOT']).'/controlDatabase/connectDatabase.php');
   include_once(realpath($_SERVER['DOCUMENT_ROOT']).'/sessions/Session.class.php');

   $error="";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
     $query = "SELECT * FROM user";
     $result = $db->query($query);
     $hodnota=False;
     if (mysqli_num_rows($result)>0){
	        while($row = mysqli_fetch_assoc($result)){
                if ($row["name"]==strval($_POST["username"]) && $row["pass"]==strval($_POST["password"])) {
			        $hodnota = true;
                }
            }
     }
     if($hodnota) {
         $_SESSION['login_user'] = getUserIdByName($_POST["username"]);
         start($_SESSION['login_user']);
     }else{
         $error = "Your Login Name or Password is invalid";
     }
     mysqli_close($db);
   }
   function getUserIdByName($name){        
        include(realpath($_SERVER['DOCUMENT_ROOT']).'/controlDatabase/connectDatabase.php');
        $query = "SELECT iduser FROM user WHERE name ='$name'";
        $result = $db->query($query);
        $userId= mysqli_fetch_array($result);
        mysqli_close($db);
        return $userId['iduser'];
   }
   function start($userId){
        include(realpath($_SERVER['DOCUMENT_ROOT']).'/controlDatabase/connectDatabase.php');
        $query = " SELECT count(*) AS 'count' FROM score  WHERE user_iduser = '$userId'";
        $result = $db->query($query);
        $count = mysqli_fetch_array($result);
        mysqli_close($db);
        if($count['count'] == 0) {
             include(realpath($_SERVER['DOCUMENT_ROOT']).'/controlDatabase/connectDatabase.php');
             $sql = "INSERT INTO score (user_iduser) VALUES ('$userId')";
             if ($db->query($sql) === TRUE) {
                header("location: index.php?pass=L0");
            } else {
                echo "Error: " . $sql . "<br>" . $db->error;
            }
        }else{
             header("location: index.php?pass=L0");
        }
         mysqli_close($db);
   }
?>
<html>
   
   <head>
      <title>HACK_TEST_2K19</title>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="/css/mui.min.css" rel="stylesheet" type="text/css" />
      <script src="/js/mui.min.js"></script> 
      <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
      <link rel="stylesheet" type="text/css" href="css/style.css">  
   </head>
   
   <body>
      <h1>WELCOME TO THE HACK_TEST_2K19</h1>
     <p> Do you know what's waiting for you?<br/><a href="https://www.youtube.com/watch?v=91TCgj_pQ98" target="_blank" >Here's a little tasting.</a></p>
      <div align = "center" style = "background-color:">
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
      <br/>
      <a href="http://purkiada.sspbrno.cz/Matrix10/">BACK TO /HOME</a>
        <br/>
      <a href="/register/index.php">REGISTER</a>
      <p>By: Hony</p>
   </body>
</html>
