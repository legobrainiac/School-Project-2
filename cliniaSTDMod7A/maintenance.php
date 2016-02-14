<?php
	//include("util.php");
	if(!isset($page)) { ?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>[MANUTENÇÃO]	STD Psiquiatria | A sua mente, a nossa força!</title>
			<meta charset='utf-8'>
		    <link rel='icon' type='image/png' href='images/small_icon.png' />
		    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
		    <meta name='viewport' content='width=device-width, initial-scale=1'>
		    <meta name='description' content='Web Design, Software and Game Development'>
		    <meta name='author' content='André Santos ahiruproductions'>
		    <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet'>
		    <link href='css/style.css' rel='stylesheet'>
		    <link href='http://getbootstrap.com/examples/offcanvas/offcanvas.css' rel='stylesheet'>
		    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
		    <script src='bootstrap/js/bootstrap.min.js'></script>
		    <script src='http://getbootstrap.com/examples/offcanvas/offcanvas.js'></script>
		    <script src='js/script.js'></script>
		</head>
		<body id="maintenance">

<?php } ?>


			<div id="logo" style="width: 105px; margin-left: auto; margin-right: auto; margin-top: 12%"></div>
			<div id="maintenance">
				<h1><?php if(isset($page)) echo "Página "; else echo "Site "; ?>em manutenção<br />
				<img src="http://starseurope.org/editor/ckfinder/skins/kama/images/toolbar/settings.png" id="settings"><br /></h1>
				<p>
					Estamos a trabalhar na manutenção. <br /> A nossa equipa está a trabalhar arduamente e voltaremos em breve ;)<br/><br/>
					<button class="btn btn-danger"><a href="mailto:geral@stdpsiquiatria.pt" style="text-decoration: none; color: #fff;">Enviar um e-mail ></a></button>
					<?php if(isset($page) == true) echo "<button class='btn btn-info'><a href='index.php' style='text-decoration: none; color: #fff'>Homepage »</a></button>"; ?>
				</p>
			</div>

<?php 
	if(!isset($page)) { ?>
		</body>
	</html>
<?php } ?>