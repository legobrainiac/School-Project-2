<?php 
    include('connection.php');
    include('functions.php');

    $siteData   = $mysqli->query("SELECT * FROM site WHERE ID = 1");      
    $siteData   = $siteData->fetch_array();
    $siteTitle  = $siteData["nome"];
    $siteSlogan = $siteData["slogan"];
    $siteDesc   = $siteData["SobreNosTexto"];
?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <title>About > <?=$siteTitle . " | " . $siteSlogan?></title>
    <?=$headerContent?>
    <script type="text/javascript">
    	$(function(){
    		var menu_home = $('.home');
    		var menu_about = $('.about');
    		menu_home.removeClass("active");
    		menu_about.addClass("active");
    	});
    </script>
  </head>

  <body id="about">
    <header id="header">
        <?php include("header.php") ?>
    </header>

    <section class="body_container">
        <div id="title">
            <span id="title_page">About Us</span>
        </div>

        <div id="project">
            <div id="video" class="col-xs-6 col-md-4" style="margin-left: -12px;">
                <img src="images/videounavailable.jpg" class="img-responsive" />
            </div>
            <div id="description" class="col-xs-12 col-sm-6 col-md-8">
                <h4>Sobre Nós</h4>
                <?=$siteDesc?>
            </div>
        </div>
        <div id="team">
            <h4 style="margin-bottom: 15px">Our Team</h4>
            <div class="members">
            </div>
        </div>
    </section>

    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>
