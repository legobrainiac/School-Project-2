<form action="" method="POST">
	<input type="text">
	<input type="password" name="txtPass">
	<input type="submit" name="btnSubmit">
</form>

<?php 
	if(isset($_POST["btnSubmit"])) {
		echo $_POST["txtPass"] . "<br>";
		$pass = md5(sha1(sha1(md5($_POST["txtPass"]))));
		echo "$pass";
	}
?>