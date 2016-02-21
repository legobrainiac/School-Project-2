<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    include("../util.php");
    $nomePagina = "Inquérito | Heteroavaliação do trabalho";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php echo "$nomePagina > +STD > $siteTitle";?></title>
        <style type="text/css">
            .range {
                display: table;
                position: relative;
                height: 25px;
                margin-top: 20px;
                background-color: rgb(245, 245, 245);
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
                cursor: pointer;
            }

            .range input[type="range"] {
                -webkit-appearance: none !important;
                -moz-appearance: none !important;
                -ms-appearance: none !important;
                -o-appearance: none !important;
                appearance: none !important;

                display: table-cell;
                width: 100%;
                background-color: transparent;
                height: 25px;
                cursor: pointer;
            }
            .range input[type="range"]::-webkit-slider-thumb {
                -webkit-appearance: none !important;
                -moz-appearance: none !important;
                -ms-appearance: none !important;
                -o-appearance: none !important;
                appearance: none !important;

                width: 11px;
                height: 25px;
                color: rgb(255, 255, 255);
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: 0px;
                background-color: rgb(153, 153, 153);
            }

            .range input[type="range"]::-moz-slider-thumb {
                -webkit-appearance: none !important;
                -moz-appearance: none !important;
                -ms-appearance: none !important;
                -o-appearance: none !important;
                appearance: none !important;
                
                width: 11px;
                height: 25px;
                color: rgb(255, 255, 255);
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: 0px;
                background-color: rgb(153, 153, 153);
            }

            .range output {
                display: table-cell;
                padding: 3px 5px 2px;
                min-width: 40px;
                color: rgb(255, 255, 255);
                background-color: rgb(153, 153, 153);
                text-align: center;
                text-decoration: none;
                border-radius: 4px;
                border-bottom-left-radius: 0;
                border-top-left-radius: 0;
                width: 1%;
                white-space: nowrap;
                vertical-align: middle;

                -webkit-transition: all 0.5s ease;
                -moz-transition: all 0.5s ease;
                -o-transition: all 0.5s ease;
                -ms-transition: all 0.5s ease;
                transition: all 0.5s ease;

                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: -moz-none;
                -o-user-select: none;
                user-select: none;
            }
            .range input[type="range"] {
                outline: none;
            }

            .range.range-primary input[type="range"]::-webkit-slider-thumb {
                background-color: rgb(66, 139, 202);
            }
            .range.range-primary input[type="range"]::-moz-slider-thumb {
                background-color: rgb(66, 139, 202);
            }
            .range.range-primary output {
                background-color: rgb(66, 139, 202);
            }
            .range.range-primary input[type="range"] {
                outline-color: rgb(66, 139, 202);
            }

            .range.range-success input[type="range"]::-webkit-slider-thumb {
                background-color: rgb(92, 184, 92);
            }
            .range.range-success input[type="range"]::-moz-slider-thumb {
                background-color: rgb(92, 184, 92);
            }
            .range.range-success output {
                background-color: rgb(92, 184, 92);
            }
            .range.range-success input[type="range"] {
                outline-color: rgb(92, 184, 92);
            }

            .range.range-info input[type="range"]::-webkit-slider-thumb {
                background-color: rgb(91, 192, 222);
            }
            .range.range-info input[type="range"]::-moz-slider-thumb {
                background-color: rgb(91, 192, 222);
            }
            .range.range-info output {
                background-color: rgb(91, 192, 222);
            }
            .range.range-info input[type="range"] {
                outline-color: rgb(91, 192, 222);
            }

            .range.range-warning input[type="range"]::-webkit-slider-thumb {
                background-color: rgb(240, 173, 78);
            }
            .range.range-warning input[type="range"]::-moz-slider-thumb {
                background-color: rgb(240, 173, 78);
            }
            .range.range-warning output {
                background-color: rgb(240, 173, 78);
            }
            .range.range-warning input[type="range"] {
                outline-color: rgb(240, 173, 78);
            }

            .range.range-danger input[type="range"]::-webkit-slider-thumb {
                background-color: rgb(217, 83, 79);
            }
            .range.range-danger input[type="range"]::-moz-slider-thumb {
                background-color: rgb(217, 83, 79);
            }
            .range.range-danger output {
                background-color: rgb(217, 83, 79);
            }
            .range.range-danger input[type="range"] {
                outline-color: rgb(217, 83, 79);
            }
        </style>
        <script type="text/javascript">
            function actRange(value) {
                rangeInfo.value=value;
                if(value > 0 && value < 10) {
                    alert("Mau");
                }
                else if(value > 10 && value < 18) {
                    alert("Bom");
                }
                else {
                    alert("muito Bom");
                }
            }
        </script>
        <?php 
            echo $headerContentPainel;
            $username = $_SESSION["user"];
        ?>
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
                                <form action="" method="POST">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Heteroavaliação</label><br/>
                                    <div class="range range-info">
                                        <input type="range" name="range" min="0" max="20" value="0" onchange="rangeInfo.value=value">
                                        <output id="rangeInfo">0</output>
                                    </div>
                                  </div><br/><br/>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Comentários</label>
                                    <textarea class="form-control" rows="10" name="comentario"></textarea>
                                  </div>
                                  <button type="submit" class="btn btn-default" name="btnEnviar">Enviar</button>
                                </form>
                            </div> <!-- /.panel-body -->
                        </div> <!-- /#collapseOne -->
                    </div> <!-- /.panel -->
                </div> <!-- /.panel-group -->

            </section> <!-- /#dashboard -->
        </section> <!-- /#content -->
    </body>
</html>

<?php
    if(isset($_POST["btnEnviar"])) {
        $votante = $nome;
        $heteroavaliacao = $_POST["range"];
        $comentario = $_POST["comentario"];
        //alert("cenas: $cenas");

        $inserirVotacao = $mysqli->query("INSERT INTO votacao(votante, heteroavaliacao, comentario) VALUES('$votante', '$heteroavaliacao', '$comentario')");
        if($inserirVotacao)
            alert("Obrigado pelo seu voto");
        else
            alert("Erro ao enviar votação...");
    }
?>