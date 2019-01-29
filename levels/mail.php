<?php
    include_once("htmlParts/header.php");
    require ("sendEmail/sendEmail.php");
    sendEmail(getUserEmail($_SESSION['login_user']));
?>
    	<div>
    		<h1>WELCOME TO THE LEVEL 6</h1>
        </div>
        <img src="../images/meme2.png">
        <div>
           <form class="mui-form--inline" action= "../index.php" method="GET">
           		<div class="mui-textfield">
      				<input type="password" name="pass">
      			</div>
      			<br>
      			<br>
      			<input class="mui-btn mui-btn--flat" type="submit" value="Confirm">
    		</form>
  			<br><br>
        </div>
        <a href="sendEmail/newEmail.php?user=<?php echo $_SESSION['login_user']?>" target="_blank">Need use another email?</a>
<?php include_once("htmlParts/footer.php");?>
