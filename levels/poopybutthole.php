<?php include_once("htmlParts/header.php");?>
<div>
	<h1>WELCOME TO THE LEVEL 2</h1>
	<p>Strange, something has changed.</p>
</div>
<div>
	<!-- https://www.w3schools.com/tags/att_global_hidden.asp -->
	<form class="mui-form--inline" action="./index.php" method="GET" hidden>
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