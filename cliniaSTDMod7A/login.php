<?php
	include("connection.php");
	include("functions.php");
	error_reporting(false);	
	if (isset($_POST["send"])) {
		if ($_POST["remember"]) {
			setcookie("unm",$_POST["input_User"], time() + (86400 * 30));
			setcookie("psw",$_POST["input_Pass"], time() + (86400 * 30));
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login > Ahiru Productions</title>
		<link rel="icon" type="image/png" href="images/small_icon.png" /> 
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style_panel.css" rel="stylesheet">
		<link href="http://getbootstrap.com/examples/offcanvas/offcanvas.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>
		<script src="http://getbootstrap.com/examples/offcanvas/offcanvas.js"></script>
		<script type="text/javascript">
			function see_pass() {
				password_in = document.getElementById('password');
				icon_see = document.getElementById('icon_see');
				password_in.type = 'text';

				$(function(){
					var icon = $('.glyphicon-eye-open');
					icon.removeClass("glyphicon-eye-open");
					icon.addClass("glyphicon-eye-close");
				});
			}


			function hide_pass() {
				password_in = document.getElementById('password');
				password_in.type = 'password';

				$(function(){
					var icon = $('.glyphicon-eye-close');
					icon.addClass("glyphicon-eye-open");
					icon.removeClass("glyphicon-eye-close");
				});
			}

			function message() {
				alert('Temos Pena :( \nFala com o André... ele é uma pessoa fantástica e, se tiveres sorte e ele tiver paciência, vê-te isso!')
			}

		</script>
	</head>

	<body>
		<div id="container">
			<div id="restricted_area">
				<?php
					if(isset($_GET["login"]) == "false") {
				?>
				<div class="alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<span class="sr-only">Error:</span>
					This is a restricted area. Please, identify yourself.
				</div>
				<?php
					}
				?>
			</div>
			<div id="login-logo"><img src="images/+std_logo.png" align="middle" width="150px"></div>
			<div id="login-form">
				<form method="POST">
					<div class="form-group">
	                    <a onclick="message()" class="pull-right label-forgot" style="cursor: pointer;">Forgot email?</a>
	                    <label for="inputUsernameEmail">Username or email</label>
	                    <input type="text" id="inputUsernameEmail" name="txtUsername" class="form-control">
	                </div>
					<div class="form-group">
						<a onclick="message()" class="pull-right label-forgot" style="cursor: pointer;">Forgot password?</a>
						<label for="inputPassword">Password</label>
						<div class="input-group">
							<input type="password" class="form-control" id="password" name="txtPassword">
							<span class="input-group-btn">
							<button class="btn btn-default" type="button" onmouseover="see_pass()" onmouseout="hide_pass()"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
							</span>
						</div>
					</div>
					<br />
					<input type="checkbox" id="remember" name="remember"><label for="remember">Remember Me</label>
					<input id="submit_login" name="btnLogin" type="submit" class="btn btn-primary pull-right" value="Login" id="btn_login">
				</form>
			</div>
			<div style="color: #ffffff; text-align: center">&copy; 2015, Ahiru Productions</div>
		</div>
	</body>
</html>

<?php
	if(isset($_POST["btnLogin"])) {
		if(empty($_POST["txtUsername"]) || empty($_POST["txtPassword"])) {
			alert("Por favor, preencha todos os campos...");
		}
		else {
			$username = $_POST["txtUsername"];
			$password = sha1(sha1(md5(sha1($_POST["txtPassword"]))));
			$user = $mysqli->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
			if($user->num_rows > 0) {
				echo "<script>location.href='painel/index.php'</script>";
				session_start();
				$_SESSION["user"] = $username;
			} else {
				alert("Nome de utilizador ou password incorretos.");
			}	
		}
	}
?>