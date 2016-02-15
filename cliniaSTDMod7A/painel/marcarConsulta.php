<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    include("../util.php");
    $nomePagina = "Marcar Consulta";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php echo "$nomePagina > +STD > $siteTitle";?></title>
        <?php 
            echo $headerContentPainel;
            $username = $_SESSION["user"];
        ?>
        <script type="text/javascript">
        function escolherClinica() {
            var val = document.getElementById("cboClinicas").options[document.getElementById("cboClinicas").selectedIndex].value;
            if(val == "porto")
                document.getElementById("imgFotoClinica").src = "../images/slide2.png";
            else if(val == "coimbra")
                document.getElementById("imgFotoClinica").src = "../images/slide3.png";
            else if(val == "faro")
                document.getElementById("imgFotoClinica").src = "../images/slide5.png";
            else 
                document.getElementById("imgFotoClinica").src = "../images/slide1.png";

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

    <body id="addPost">
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
                            </div> <!-- /.panel-body -->
                        </div> <!-- /#collapseOne -->
                    </div> <!-- /.panel -->
                </div> <!-- /.panel-group -->

            </section> <!-- /#dashboard -->
        </section> <!-- /#content -->
    </body>
</html>