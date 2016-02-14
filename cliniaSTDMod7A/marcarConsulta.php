<?php 
    include('connection.php');
    include('util.php');
    error_reporting(false);
    $nomePagina = "Contactos";
?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <title><?php echo "$nomePagina   >  $siteTitle | $siteSlogan"?></title>
    <?=$headerContent?>
    <script type="text/javascript">
    	$(function(){
    		var menu_home = $('.home');
    		var menu_contact = $('.marcar_consulta');
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

        function putActive() {
            var value = document.getElementById("optEspecialidade").options[document.getElementById("optEspecialidade").selectedIndex].value;
            switch(value) {
                case 'psiquiatria':
                    $('#medPsicologia').attr('disabled', true);
                    $('#medNeurologia').attr('disabled', true);
                    $('#medPsiquiatria').attr('disabled', false);
                    break;
                case 'psicologia':
                    $('#medPsiquiatria').attr('disabled', true);
                    $('#medNeurologia').attr('disabled', true);
                    $('#medPsicologia').attr('disabled', false);
                    //$('.onporto').attr('disabled', true);
                    break;
                case 'neurologia':
                    $('#medPsiquiatria').attr('disabled', true);
                    $('#medPsicologia').attr('disabled', true);
                    $('#medNeurologia').attr('disabled', false);
                    break;
            }

            var unidade = document.getElementById("cboClinicas").options[document.getElementById("cboClinicas").selectedIndex].value;

            if(unidade == "porto"){
                $('.onlisboa').attr('disabled', true);
                $('.oncoimbra').attr('disabled', true);
                $('.onfaro').attr('disabled', true);
                $('.onporto').attr('disabled', false);
            }
            else if(unidade == "coimbra") {
                $('.onlisboa').attr('disabled', true);
                $('.onporto').attr('disabled', true);
                $('.onfaro').attr('disabled', true);
                $('.oncoimbra').attr('disabled', false);
            }
            else if(unidade == "faro"){
                $('.onlisboa').attr('disabled', true);
                $('.oncoimbra').attr('disabled', true);
                $('.onporto').attr('disabled', true);
                $('.onfaro').attr('disabled', false); 
            }
            else {
                $('.onfaro').attr('disabled', true);
                $('.oncoimbra').attr('disabled', true);
                $('.onporto').attr('disabled', true);
                $('.onlisboa').attr('disabled', false);
            }
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

            <div class="form-group">
                <label for="optOrderBy"><b>Especialidade:</b></label>
                <select class="form-control" onchange="putActive()" id="optEspecialidade">
                    <option value="psiquiatria">Psiquiatria</option>
                    <option value="psicologia">Psicologia</option>
                    <option value="neurologia">Neurologia</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                 <form class="form-horizontal" method="POST" action="" name="formOrderBy">
                    <label for="optOrderBy"><b>Medico:</b></label>
                        <select class="form-control" name="optMedico">
                            <optgroup label="Psiquiatria" id="medPsiquiatria">
                                <?php 
                                    $medicos = $mysqli->query("SELECT * FROM medicos WHERE Especialidade='Psiquiatria'");
                                    while($nomes = $medicos->fetch_array()) {
                                ?> 
                                    <option class="on<?=strtolower($nomes['unidade'])?>"><?=$nomes["Nome"]?></option>
                                <?php } ?>
                            </optgroup>

                            <optgroup label="Psicologia" id="medPsicologia">
                                <?php 
                                    $medicos = $mysqli->query("SELECT * FROM medicos WHERE Especialidade='Psicologia'");
                                    while($nomes = $medicos->fetch_array()) {
                                ?> 
                                    <option class="on<?=strtolower($nomes['unidade'])?>"><?=$nomes["Nome"]?></option>
                                <?php } ?>
                            </optgroup>

                            <optgroup label="Neurologia" id="medNeurologia">
                                <?php 
                                    $medicos = $mysqli->query("SELECT * FROM medicos WHERE Especialidade='Neurologia'");
                                    while($nomes = $medicos->fetch_array()) {
                                ?> 
                                    <option class="on<?=strtolower($nomes['unidade'])?>"><?=$nomes["Nome"]?></option>
                                <?php } ?>
                            </optgroup>
                        </select>
                </form>
            </div>

            <div class="form-group col-md-4">
                <label for="optOrderBy"><b>Data da Consulta:</b></label>
                <input type="date" class="form-control"></input>
            </div>

            <div class="form-group col-md-4">
                <label for="optOrderBy"><b>Hora da Consulta:</b></label>
                <select class="form-control" id="optHoraConsulta">
                    <option value="8:25">08:25-09:10</option>
                    <option value="9:10">09:10-09:55</option>
                    <option value="10:10">10:10-10:55</option>
                    <option value="">10:55-11:40</option>
                    <option>11:55-12:35</option>
                    <option>12:35-13:20</option>
                    <option>13:25-14:10</option>
                    <option>14:10-14:55</option>
                    <option>15:05-15:50</option>
                    <option>15:50-16:35</option>
                    <option>16:50-17:35</option>
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