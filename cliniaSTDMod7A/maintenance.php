<?php
	if(!isset($page)) { ?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>[MAINTENANCE] ahiru productions | Program your dreams!</title>
			<link rel="icon" type="image/png" href="images/small_icon.png" />
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="Web Design, Software and Game Development">
			<meta name="author" content="André Santos ahiruproductions">
			<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
			<link href="css/style.css" rel="stylesheet">
			<link href="http://getbootstrap.com/examples/offcanvas/offcanvas.css" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
			<script src="bootstrap/js/bootstrap.min.js"></script>
			<script src="http://getbootstrap.com/examples/offcanvas/offcanvas.js"></script>
			<script src="js/script.js"></script>
		</head>
		<body id="maintenance">

<?php } ?>


			<div id="logo" style="width: 149px; margin-left: auto; margin-right: auto; margin-top: 12%"></div>
			<div id="maintenance">
				<h1><?php if(isset($page)) echo "Page "; else echo "Site "; ?>under Maintenance<br />
				<img src="http://starseurope.org/editor/ckfinder/skins/kama/images/toolbar/settings.png" id="settings"><br /></h1>
				<p>
					We are working on maintenance. <br /> Our team is working hard and we will be back soon ;)<br/><br/>
					<button class="btn btn-danger"><a href="mailto:general@ahiruproductions.com" style="text-decoration: none; color: #fff;">Send an email ></a></button>
					<?php if(isset($page) == true) echo "<button class='btn btn-info'><a href='index.php' style='text-decoration: none; color: #fff'>Homepage »</a></button>"; ?>
				</p>
			</div>

<?php 
	if(!isset($page)) { ?>
		</body>
	</html>
<?php } ?>