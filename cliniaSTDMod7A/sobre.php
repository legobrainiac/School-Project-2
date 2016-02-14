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

    <style type="text/css">
        ul#album-fotos {
            width: 100%;
            padding: 50px;
            overflow: hidden;
            list-style: none;
            margin-left: 100px;
        }

        ul#album-fotos li img {
            width: 100%;
            height: 100%;
        }

        ul#album-fotos li {
            float: left;
            width: 200px;
            height: 200px;
            margin: 10px;
            border: 5px solid white;
            background-color: #FFFFFF;
            box-shadow: 1px 1px 3px rgba(0,0,0,.4);
            -webkit-transition: all .4s ease-in;

        }

        ul#album-fotos li:hover {
            -webkit-transform: scale(1.5);
            background-position: 0px 0px;
            background-size: 200px 200px;
        }

        ul#album-fotos li span {
            opacity: 0;
            line-height: 350px;
            font-size: 7pt;
            color: #FFFFFF;
            background-color: rgba(0,0,0,.3);
            padding: 5px;
            text-shadow: 1px 1px 1px black;
        }
        ul#album-fotos li:hover span{
            opacity: 1;
        }

        ul#album-fotos li#foto01 {
            background: url(images/slide1.png) no-repeat;
            background-position: 50% 50%;
            background-size: 400px 400px;
            background-color: #FFFFFF;}
        ul#album-fotos li#foto01:hover {
            background-position: 0px 0px;
            background-size: 200px 200px;
        }

        ul#album-fotos li#foto02 {
            background: url(images/slide2.png) no-repeat;
            background-position: 50% 50%;
            background-size: 400px 400px;
            background-color: #FFFFFF;}
        ul#album-fotos li#foto02:hover {
            background-position: 0px 0px;
            background-size: 200px 200px;
        }

        ul#album-fotos li#foto03 {
            background: url(images/slide3.png) no-repeat;
            background-position: 50% 50%;
            background-size: 400px 400px;
            background-color: #FFFFFF;}
        ul#album-fotos li#foto03:hover {
            background-position: 0px 0px;
            background-size: 200px 200px;
        }

        ul#album-fotos li#foto04 {
            background: url(images/slide5.png) no-repeat;
            background-position: 50% 50%;
            background-size: 400px 400px;
            background-color: #FFFFFF;}
        ul#album-fotos li#foto04:hover {
            background-position: 0px 0px;
            background-size: 200px 200px;
        }

        ul#album-fotos li#foto05 {
            background: url(../_imagens/galeria-05.jpg) no-repeat;
            background-position: 50% 50%;
            background-size: 400px 400px;
            background-color: #FFFFFF;}
        ul#album-fotos li#foto05:hover {
            background-position: 0px 0px;
            background-size: 200px 200px;
        }

        ul#album-fotos li#foto06 {
            background: url(../_imagens/galeria-06.jpg) no-repeat;
            background-position: 50% 50%;
            background-size: 400px 400px;
            background-color: #FFFFFF;}
        ul#album-fotos li#foto06:hover {
            background-position: 0px 0px;
            background-size: 200px 200px;
        }
    </style>
  </head>

  <body id="about">
    <header id="header">
        <?php include("header.php") ?>
    </header>

    <section class="body_container" style="margin-bottom: 50px;">
        <div id="title">
            <span id="title_page"><?=$nomePagina?></span>
        </div>

        <div id="project">
            <div id="video" class="col-xs-6 col-md-4" style="margin-left: -12px;">
                <iframe width="400" height="259" src="https://www.youtube.com/embed/m6GerEOK5Ko" frameborder="0" allowfullscreen></iframe>
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
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="clinicas">
            <h4>As nossas Clínicas</h4>
             <ul id="album-fotos">
                <li id="foto01"><span>STD Lisboa</span></li>
                <li id="foto02"><span>STD Porto</span></li>
                <li id="foto03"><span>STD Coimbra</span></li>
                <li id="foto04"><span>STD Faro</span></li>
            </ul>
        </div>
        <div id="team">
            <h4 style="margin-bottom: 15px">A nossa equipa</h4>
            <div class="members" style="margin-left: 100px;">
                <?php 
                    $medicos = $mysqli->query("SELECT * FROM medicos");
                    while($dadosMed = $medicos->fetch_array()) {
                ?>
                    <div class="one_mem">
                        <img class="img_about" src="images/<?=$dadosMed["Nome"]?>.png">
                        <h3 class="name"><?=$dadosMed["Nome"]?></h3>
                        <div class="job-title"><?=$dadosMed["Especialidade"] ." | STD " . $dadosMed["unidade"]?></div>
                        <ul id="socialicon">
                          <a href="mailto:@stdpsiquiatria.pt" target="_blank"><li class="mail" data-toggle="tooltip" data-placement="bottom" title="E-mail"></li></a>
                        </ul>
                        <script>
                            $(function(){
                                $('[data-toggle="tooltip"]').tooltip()
                            });
                        </script>
                    </div>
                <?php } ?>
            </div>
        </div>

        <h4>Agora, a verdade...</h4>
        <p> <?php echo"Na verdade, tudo isto não passa de um trabalho para a disciplina de Redes de Comunicação do 2º(11º)Ano do curso de GPSI, pedido pelas professoras <b>Helena Figueiredo</b> e <b>Kátia Coelho</b>, no ano letivo 2015/2016 na Escola Secundária de Emídio Navarro, em Viseu. <br /> <br /> Esperamos que se divirtam tanto a corrigir o trabalho como nós a fazê-lo. <br/><br/>Um grande abraço, <br /> <b>André Santos</b> e <b>Tomás Pinto</b>"; ?>
        <center><img src="images/Rodape_Logotipos_CursosProfissionais.png" style="max-width:500px;"></center>
        </p>
    </section>

    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>
