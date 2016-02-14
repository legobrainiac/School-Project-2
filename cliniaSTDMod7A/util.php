<?php
    include("connection.php");
    session_start();
	$headerContent = 
	"<meta charset='utf-8'>
    <link rel='icon' type='image/png' href='favSTD.png' />
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
    <link rel='icon' type='image/png' href='../images/fav+STD.png' />
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

    $siteData = $mysqli->query("SELECT * FROM site WHERE ID = 1");      
    $siteData = $siteData->fetch_array();
    $siteTitle = $siteData["nome"];
    $siteSlogan = $siteData["slogan"];
    $siteDesc   = $siteData["SobreNosTexto"];
    $siteEmail = $siteData["email"];
    $siteTelefone = $siteData["telefone"];
    $manutencao =  $siteData["manutencao"];
    $visitas = $siteData["visitas"];
    $sobre = $siteData["SobreNosTexto"];
    $visitas++;
    $updateVisitas = $mysqli->query("UPDATE site SET visitas = '$visitas' WHERE ID = 1");
    if($manutencao) {
        if(!isset($_SESSION["user"]))
            echo "<script>location.href='maintenance.php'</script>";
    }
    if(isset($_SESSION["user"])) {
        $username = $_SESSION["user"];
        $sessionInfo = $mysqli->query("SELECT * FROM users WHERE username = '$username'");
        $row   = $sessionInfo->num_rows;
        if($row) {
            $dados = $sessionInfo->fetch_array();
            $id = $dados["ID"];
            $nome = $dados["nome"];
            $mail = $dados["email"];
            $last_sign = $dados["last_sign"];
            $permissao = $dados["permissoes"];
        }
    }  

    function alert($text)
    {
        echo "<script>alert('$text')</script>";
    }

    function erroForm($message) {
        echo "
        <div class='alert alert-danger' role='alert' style='font-size:10pt; margin-left: 0px;'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
            <span class='sr-only'>Erro:</span>
            $message
        </div>  
        ";
    }
?>