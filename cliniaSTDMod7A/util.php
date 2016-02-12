<?php
    include("connection.php");
	$headerContent = 
	"<meta charset='utf-8'>
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
    "; 

    $headerContentPainel =
    "<meta charset='utf-8'>
    <link rel='icon' type='image/png' href='../images/small_icon.png' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content='Web Design, Software and Game Development'>
    <meta name='author' content='André Santos ahiruproductions'>
    <link href='../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
    <link href='../css/style_panel.css' rel='stylesheet'>
    <link href='http://getbootstrap.com/examples/offcanvas/offcanvas.css' rel='stylesheet'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
    <script src='../bootstrap/js/bootstrap.min.js'></script>
    <script src='http://getbootstrap.com/examples/offcanvas/offcanvas.js'></script>
    <script src='../js/script.js'></script>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    ";
    
	function alert($text)
	{
		echo "<script>alert('$text')</script>";
	}

    function getSessionInfo() {
        $username = $_SESSION["user"];
        $check = $mysqli->query("SELECT * FROM users WHERE username='$username'");
        $row   = $check->num_rows;
        if($row) {
            $dados = $check->fetch_array();
            $id = $dados["ID"];
            $name = $dados["nome"];
        }
    }

    $siteData = $mysqli->query("SELECT * FROM site WHERE ID = 1");      
    $siteData = $siteData->fetch_array();
    $siteTitle = $siteData["nome"];
    $siteSlogan = $siteData["slogan"];
    $siteDesc   = $siteData["SobreNosTexto"];
    $siteEmail = $siteData["email"];
    $siteTelefone = $siteData["telefone"];
?>