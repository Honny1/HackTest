<?php include_once("htmlParts/header.php");?>
<div>
	<h1>WELCOME TO THE LEVEL 1</h1>
	<p>Do you know password?</p>
	<p>Hint: Press F12 and open new world.</p>
</div>
<div>
	<form class="mui-form--inline" action="./index.php" method="GET">
		<div class="mui-textfield">
			<input type="password" name="pass">
		</div>
		<br>
		<br>
		<input class="mui-btn mui-btn--raised" type="submit" value="Confirm">
	</form>
	<br><br>
	<p hidden>Password: poopybutthole</p>
</div>
<?php include_once("htmlParts/footer.php");?>
