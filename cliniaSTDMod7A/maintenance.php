<?php
	include("util.php");
	if(!isset($page)) { ?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>[MAINTENANCE] ahiru productions | Program your dreams!</title>
			<?=$headerContent?>
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