<!--*******************************************************************
                          

                              CLINICA STD
                Redes de Comunicação | Módulo 7A | 2015-2016

  version:    2.0
  date:       27/01/2016
  author:     André Santos | Tomás Pinto
  email:      a20569@esenviseu.net | a19647@esenviseu.net
  website:    www.oaef.xyz | www.mlg360.xyz

*********************************************************************--> 

<?php 
    include('connection.php');
    include('functions.php');
    $siteData = $mysqli->query("SELECT * FROM site WHERE ID = 1");      
    $siteData = $siteData->fetch_array();
    $siteTitle = $siteData["nome"];
    $siteSlogan = $siteData["slogan"];
?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <title>Home > <?=$siteTitle . " | " . $siteSlogan?></title>
    <?=$headerContent?>
    <script>
      function close_alert() {
        <?php setcookie("viewed",true, time() + 7200); ?>
      }
    </script>
  </head>

  <body id="home">
    <?php if(isset($_COOKIE["viewed"]) != 1) { ?>
        <div id="cookie_accept">
          <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="close_alert()"><span aria-hidden="true">&times;</span></button>
            <b>Este website utiliza cookies</b> que têm funcionalidades que melhoram a sua navegação. <br />Ao continuar a navegar, está a concordar com a sua utilização. <a href="https://pt.wikipedia.org/wiki/Cookie_HTTP" target="_blank" title="Wikipedia | Cookies">Saiba mais sobre o que são cookies.
          </div>
        </div>
      <?php } ?>
    <header>
        <?php include("header.php") ?>
    </header>
    <div id="slide">
        <?php include("slide.php"); ?>
    </div>
    <section class="body_container">
        <div class="row">
            <div class="col-lg-4">
                <img class="img-circle" src="http://www.clinicacapitalis.pt/images/psiquiatria.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>Psiquiatria</h2>
                <p align="Justify">Psiquiatria é uma especialidade da Medicina que lida com a prevenção, atendimento, diagnóstico, tratamento e reabilitação das diferentes formas de sofrimentos mentais, sejam elas de cunho orgânico ou funcional, com manifestações psicológicas severas. A STD tem os melhores profissionais para o ajudar no seu caso.</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" src="http://www.unimedbhonline.com/wp-content/uploads/2012/08/programa-do-idoso.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>Consulta do Idoso</h2>
                <p align="Justify">Ao disponibilizarmos esta Consulta do Idoso, pretendemos esclarecer desde já, que o envelhecimento não é uma doença, mas um prcesso natural de evolução do ser humano.Existe uma enorme variabilidade no processo de envelhecimento. Nalgumas pessoas este processo é mais intenso do que noutras.</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" src="http://www.clinicasaocristovao.pt/upload/internamento.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Internamento</h2>
                <p align="Justify">Algumas doenças psiquiátricas, na sua fase aguda, implicam que o paciente fique em regime de internamento. O nosso objectivo ao proporcionar a valência de internamento é assegurar uma continuidade de cuidados. Este serviço é disponibilizado em unidade de internamento de reconhecida qualidade.</p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

        <!--<hr class="featurette-divider">-->
        <section id="featureds">
            <div id="featured_video" class="col-md-8">
                <h4>Últimos Vídeos</h4>
                <h5><b>A clínica na TV</b></h5>
                <iframe width="305" height="170" src="https://www.youtube.com/embed/J7IHy1FU9YM" frameborder="0" allowfullscreen id="videoEmbed"></iframe>
                <div id="videoDescription">
                    A nossa diretora geral, Georgina Fonseca, deu uma entrevista à SIC onde explicou o nosso novo projeto: as consultas on-line. Em breve, teremos disponível este novo projeto.<br/> Continuamos, assim, a ser a mais inovadora rede de clinicas.
                </div>
            </div>
            <div id="featured_projects" class="col-md-4" style="margin-bottom:50px;">
                <h4>Rede de Clínicas</h4>
                    <img src="images/clinicas.png" style="margin-bottom: 10px;" class="miniAppIMG">
                <h4>Médicos</h4>
                <img src="images/medicos.png" style="margin-bottom: 10px;" class="miniAppIMG">
                <h4>Mais STD</h4>
                <img src="images/+std.png" style="margin-bottom: 10px;" class="miniAppIMG">
            </div>
        </section>
    </section>
    <section id="message">
        <a href=""><img src="http://schoolweb.tdsb.on.ca/Portals/soes/images/Form%20icon.png" align="right" height="150px" width="150px">
        <h1><b>Do you Like</b>? Give us your <b>feedback</b>.</h1></a>
        <p>Your feedback is very important to us!<br />
        Fill out our form. Say what you think and give suggestions. We read everything! <br />
        Come on, we trust you!</p>
    </section>

    <footer>
        <?php include("footer.php"); ?>
    </footer>
  </body>
</html>
