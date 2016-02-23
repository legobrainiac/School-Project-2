<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    include("../util.php");
    $nomePagina = "Marcar Consulta";
    $haerro = false;
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php echo "$nomePagina > +STD > $siteTitle";?></title>
        <script type="text/javascript">putActive();</script>
        <?php 
            echo $headerContentPainel;
            $username = $_SESSION["user"];
        ?>
        <script type="text/javascript">
        function escolherClinica() {
            var val = document.getElementById("cboClinicas").options[document.getElementById("cboClinicas").selectedIndex].value;
            if(val == "Porto")
                document.getElementById("imgFotoClinica").src = "../images/slide2.png";
            else if(val == "Coimbra")
                document.getElementById("imgFotoClinica").src = "../images/slide3.png";
            else if(val == "Faro")
                document.getElementById("imgFotoClinica").src = "../images/slide5.png";
            else 
                document.getElementById("imgFotoClinica").src = "../images/slide1.png";

        }

        function putActive() {
            var unidade = document.getElementById("cboClinicas").options[document.getElementById("cboClinicas").selectedIndex].value;
            if(unidade == "Porto"){
                $('.onlisboa').attr('disabled', true);
                $('.oncoimbra').attr('disabled', true);
                $('.onfaro').attr('disabled', true);
                $('.onporto').attr('disabled', false);
            }
            else if(unidade == "Coimbra") {
                $('.onlisboa').attr('disabled', true);
                $('.onporto').attr('disabled', true);
                $('.onfaro').attr('disabled', true);
                $('.oncoimbra').attr('disabled', false);
            }
            else if(unidade == "Faro"){
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

            var value = document.getElementById("optEspecialidade").options[document.getElementById("optEspecialidade").selectedIndex].value;
            //alert("value : " + value);
            switch(value) {
                case 'Psiquiatria':
                    $('#medPsicologia').attr('disabled', true);
                    $('#medNeurologia').attr('disabled', true);
                    $('#medPsiquiatria').attr('disabled', false);
                    break;
                case 'Psicologia':
                    $('#medPsiquiatria').attr('disabled', true);
                    $('#medNeurologia').attr('disabled', true);
                    $('#medPsicologia').attr('disabled', false);
                    break;
                case 'Neurologia':
                    $('#medPsiquiatria').attr('disabled', true);
                    $('#medPsicologia').attr('disabled', true);
                    $('#medNeurologia').attr('disabled', false);
                    break;
            }
        }
    </script>
    </head>

    <body id="addPost" onload="putActive()">
        <section id="navbar_sup">
            <?php include("navbarSup.php") ?>
        </section> <!-- #navbar_sup -->
        <section id="content">
            <section id="navbar_lat">
                <?php include("navbarLat.php") ?>
            </section> <!-- /#navbar_lat -->
            <section id="dashboard">
                <div id="header">   
                    <table>
                        <tr>
                            <td class="right_divider" style="font-size: 14pt; text-indent: 7px;" width="20.5%"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Painel de Controlo</td>
                            <td class="right_divider" width="71%"><span class="glyphicon glyphicon-info-sign"></span> Bem-Vindo de volta, <?php echo " <b>$nome</b>!"?></td>
                        </tr>
                    </table>
                </div> <!-- #header -->

                <div id="path">
                    <ol class="breadcrumb">
                        <li><span class="glyphicon glyphicon-home"></span></li>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Consultas</a></li>
                        <li class="active"><?=$nomePagina?></li>
                    </ol>
                </div> <!-- path -->

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <?php echo "$nomePagina"; ?>
                            </h4> <!-- /.panel-title -->
                        </div> <!-- /.panel-heading -->
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <img class="img_header_contact" src="../images/slide1.png" id="imgFotoClinica" style="max-width: 100%;"><br /><br />
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label for="clinica">Clínica:</label>
                                        <select class="form-control" onchange="escolherClinica(); putActive()" id="cboClinicas" name="optClinica">
                                            <option value="Lisboa">STD Lisboa</option>
                                            <option value="Porto">STD Porto</option>
                                            <option value="Coimbra">STD Coimbra</option>
                                            <option value="Faro">STD Faro</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="optOrderBy"><b>Especialidade:</b></label>
                                        <select class="form-control" onchange="putActive()" id="optEspecialidade" name="optEspecialidade">
                                            <option value="Psiquiatria">Psiquiatria</option>
                                            <option value="Psicologia">Psicologia</option>
                                            <option value="Neurologia">Neurologia</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="optOrderBy"><b>Médico:</b></label>
                                            <?php
                                                if(isset($_POST["btnMarcarConsulta"]) && $_POST["optMedico"] == "nenhum") {
                                                    $haerro = true;
                                                    erroForm("Por favor, selecione um médico.");
                                                }
                                            ?>
                                            <select class="form-control" name="optMedico">
                                                <option value="nenhum">-- Escolher Médico --</option>
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
                                    </div>

                                    <?php
                                        if(isset($_POST["btnMarcarConsulta"])) {
                                            $unidade = $_POST["optClinica"];
                                            $especialidade = $_POST["optEspecialidade"];
                                            $medico = $_POST["optMedico"];
                                            $data = $_POST["txtData"];
                                            if($_POST["optHoraConsulta"] == "1")
                                                $hora = "08:25-09:10";
                                            elseif ($_POST["optHoraConsulta"] == "2")
                                                $hora = "09:10-09:55";
                                            elseif ($_POST["optHoraConsulta"] == "3")
                                                $hora = "10:10-10:55";
                                            elseif ($_POST["optHoraConsulta"] == "4")
                                                $hora = "10:55-11:40";
                                            elseif ($_POST["optHoraConsulta"] == "5")
                                                $hora = "11:55-12:35";
                                            elseif ($_POST["optHoraConsulta"] == "6")
                                                $hora = "12:35-13:20";
                                            elseif ($_POST["optHoraConsulta"] == "7")
                                                $hora = "13:25-14:10";
                                            elseif ($_POST["optHoraConsulta"] == "8")
                                                $hora = "14:10-14:55";
                                            elseif ($_POST["optHoraConsulta"] == "9")
                                                $hora = "15:05-15:50";
                                            elseif ($_POST["optHoraConsulta"] == "10")
                                                $hora = "15:50-16:35";
                                            else
                                                $hora = "16:50-17:35";
                                            $check = $mysqli->query("SELECT * FROM consultas WHERE data = '$data' AND medico = '$medico' AND hora = '$hora' AND clinica = '$unidade'");
                                            if($check->num_rows != 0) {
                                                erroForm("Infelizmente, esse horário já está ocupado.<br />Por favor, escolha outro horário.");
                                            }
                                        }
                                    ?>

                                    <div class="form-group">
                                        <label for="optOrderBy"><b>Data da Consulta:</b></label>
                                        <?php 
                                            if(isset($_POST["btnMarcarConsulta"]) && verificar_data($_POST["data"])) {
                                                $haerro = true;
                                                erroForm("Data anterior à atual. <br/> Por favor, verifique!");
                                            }
                                        ?>
                                        <input type="date" class="form-control" name="txtData"></input>
                                    </div> 

                                    <div class="form-group">
                                        <label for="optHoraConsulta"><b>Hora da Consulta:</b></label>
                                        <select class="form-control" id="optHoraConsulta" name="optHoraConsulta">
                                            <option value="1">08:25-09:10</option>
                                            <option value="2">09:10-09:55</option>
                                            <option value="3">10:10-10:55</option>
                                            <option value="4">10:55-11:40</option>
                                            <option value="5">11:55-12:35</option>
                                            <option value="6">12:35-13:20</option>
                                            <option value="7">13:25-14:10</option>
                                            <option value="8">14:10-14:55</option>
                                            <option value="9">15:05-15:50</option>
                                            <option value="10">15:50-16:35</option>
                                            <option value="11">16:50-17:35</option>
                                        </select>
                                    </div>
                                    <input class="btn btn-primary" value="Marcar Consulta" type="submit" name="btnMarcarConsulta">
                                </form>
                            <br /><br /><br />
                            </div> <!-- /.panel-body -->
                        </div> <!-- /#collapseOne -->
                    </div> <!-- /.panel -->
                </div> <!-- /.panel-group -->

            </section> <!-- /#dashboard -->
        </section> <!-- /#content -->
    </body>
</html>

<?php
    if(isset($_POST["btnMarcarConsulta"]) && !$haerro) {
        $marcar = $mysqli->query("INSERT INTO consultas(clinica, nome, especialidade, data, hora, medico) VALUES('$unidade', '$nome', '$especialidade', '$data', '$hora', '$medico')");
        if($marcar)
            alert("Consulta Marcada!");
        else 
            alert("Erro ao marcar consulta..");
    }
?>