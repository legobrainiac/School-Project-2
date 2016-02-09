<?php 
    include('connection.php');
    include('functions.php');
    $siteData = $mysqli->query("SELECT * FROM site WHERE ID = 1");      
    $siteData = $siteData->fetch_array();
    $siteTitle = $siteData["nome"];
    $siteSlogan = $siteData["slogan"];
    error_reporting(false);
?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <title>Contact > <?=$siteTitle . " | " . $siteSlogan?></title>
    <?=$headerContent?>
    <script type="text/javascript">
    	$(function(){
    		var menu_home = $('.home');
    		var menu_contact = $('.contact');
    		menu_home.removeClass("active");
    		menu_contact.addClass("active");
    	});
    </script>
    <script type="text/javascript">
        function escolherClinica() {
            var val = document.getElementById("cboClinicas").options[document.getElementById("cboClinicas").selectedIndex].value;
            if(val == "porto")
                document.getElementById("imgFotoClinica").src = "images/slide2.png";
            else if(val == "coimbra")
                document.getElementById("imgFotoClinica").src = "images/slide3.png";
            else if(val == "faro")
                document.getElementById("imgFotoClinica").src = "images/slide5.png";
            else 
                document.getElementById("imgFotoClinica").src = "images/slide1.png";

        }
    </script>
  </head>

  <body id="about">
    <header id="header">
        <?php include("header.php") ?>
    </header>
    <section class="body_container">
        <div id="title">
            <span id="title_page">Marcar Consulta</span>
        </div>
            <img class="img_header_contact" src="images/slide1.png" id="imgFotoClinica" style="max-width: 100%;"><br /><br />
        <form method="POST" action="">
            <div class="form-group">
                <label for="clinica">Clínica:</label>
                <select class="form-control" onchange="escolherClinica()" id="cboClinicas">
                    <option value="liboa">STD Lisboa</option>
                    <option value="porto">STD Porto</option>
                    <option value="coimbra">STD Coimbra</option>
                    <option value="faro">STD Faro</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nome"><b>Nome:</b></label>
                <input type="text" placeholder="Nome" name="txtNome" class="form-control" id="nome">
            </div>

            <div class="form-group">
                <label for="nome"><b>Email:</b></label>
                <input type="text" placeholder="Email" name="txtEmail" class="form-control" id="email">
            </div>

            <div class="form-group col-md-6">
                <form class="form-horizontal" method="POST" action="" name="frmEspecialidade">
                    <label for="optOrderBy" class="col-sm-2 control-label"><b>Especialidade:</b></label>
                        <select class="form-control" onchange="javascript:frmEspecialidade.submit()" name="optEspecialidade">
                            <option value="psiquiatria">Psiquiatria</option>
                            <option value="psicologia">Psicologia</option>
                            <option value="neurologia">Neurologia</option>
                        </select>
                </form>
            </div>

            <div class="form-group col-md-6">
                <label for="clinica">Médico:</label>
                <select class="form-control" id="optMedico">
                    <?php
                        $order = "psicologia";
                            if(isset($_POST['optEspecialidade'])) {
                                if($_POST['optEspecialidade'] == 'psiquiatria')
                                    $order = 'psiquiatria';
                                elseif($_POST['optEspecialidade'] == 'psicologia')
                                    $order = 'psicologia';
                                elseif($_POST['optEspecialidade'] == 'neurologia')
                                    $order = 'neurologia';
                            }
                            alert('order: $order');
                            $select = $mysqli->query("SELECT * FROM medicos WHERE Especialidade = '$order'");
                            $row = $select->num_rows;
                                while($get = $select->fetch_array()) {
                        ?>
                                    <option><?=$dados["Nome"]?></option>
                        <?php } ?>
                </select>
            </div>

            <input type="submit" name="btnSubmit" class="btn btn-default" value="Enviar >">
        </form>
        <br /><br /><br />
    </section>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>