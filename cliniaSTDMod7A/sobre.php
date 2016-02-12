<?php 
    include('connection.php');
    include('util.php');
    if(isset($_GET))
    $nomePagina = "Sobre Nós";
?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <title><?php echo "$nomePagina   >  $siteTitle | $siteSlogan"?></title>
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
            <span id="title_page"><?=$nomePagina?></span>
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
        <?php 
            echo "
                <script type='text/javascript'>
                    $(document).ready(function () {
                        if(window.location.href.indexOf('team') > -1) {
                            var menu_home = $('.home');
                            var menu_team = $('.team');
                            var menu_about = $('.about');
                            menu_home.removeClass('active');
                            menu_about.removeClass('active');
                            menu_team.addClass('active');
                        }
                    });
                </script>
            ";
        ?>
        <div id="team">
            <h4 style="margin-bottom: 15px">A nossa equipa</h4>
            <div class="members">
            </div>
        </div>
    </section>

    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>
