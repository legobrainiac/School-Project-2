<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    include("../util.php");
    $nomePagina = "Resultados do Inquérito: Heteroavaliação do trabalho";
    if($permissao != 1) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php echo "$nomePagina > +STD > $siteTitle";?></title>
        <script src="../js/Chart.js"></script>
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
                                <?php 
                                    $getMedia = $mysqli->query("SELECT AVG(heteroavaliacao) FROM votacao");
                                    $get = $getMedia->fetch_array();
                                    //echo round($get[0],2);
                                ?>
                                <div style="font-size: 20pt; color: #000; text-align: center">
                                    Média das avaliações &nbsp;<span class="badge" style="font-size: 20pt; background-color:
                                    <?php
                                        if(round($get[0],2) > 0 && round($get[0],2) < 5)
                                            echo "#d9534f";
                                        elseif(round($get[0],2) > 5 && round($get[0],2) < 10)
                                            echo "#f0ad4e";
                                        elseif(round($get[0],2) > 10 && round($get[0],2) < 17)
                                            echo "#5bc0de";
                                        else
                                            echo "#5cb85c";
                                    ?>
                                    "><?=round($get[0],2);?></span>
                                </div>
                                <?php
                                    $getDadosVotacao = $mysqli->query("SELECT * FROM votacao");
                                    $votacao1 = 0;
                                    $votacao2 = 0;
                                    $votacao3 = 0;
                                    $votacao4 = 0;
                                    $votacao5 = 0;
                                    $votacao6 = 0;
                                    $votacao7 = 0;
                                    $votacao8 = 0;
                                    $votacao9 = 0;
                                    $votacao10 = 0;
                                    $votacao11 = 0;
                                    $votacao12 = 0;
                                    $votacao13 = 0;
                                    $votacao14 = 0;
                                    $votacao15 = 0;
                                    $votacao16 = 0;
                                    $votacao17 = 0;
                                    $votacao18 = 0;
                                    $votacao19 = 0;
                                    $votacao20 = 0;

                                    while($get = $getDadosVotacao->fetch_array()) {
                                        if($get["heteroavaliacao"] == 1)
                                            $votacao1++;
                                        elseif($get["heteroavaliacao"] == 2)
                                            $votacao2++;
                                        elseif($get["heteroavaliacao"] == 3)
                                            $votacao3++;
                                        elseif($get["heteroavaliacao"] == 4)
                                            $votacao4++;
                                        elseif($get["heteroavaliacao"] == 5)
                                            $votacao5++;
                                        elseif($get["heteroavaliacao"] == 6)
                                            $votacao6++;
                                        elseif($get["heteroavaliacao"] == 7)
                                            $votacao7++;
                                        elseif($get["heteroavaliacao"] == 8)
                                            $votacao8++;
                                        elseif($get["heteroavaliacao"] == 9)
                                            $votacao9++;
                                        elseif($get["heteroavaliacao"] == 10)
                                            $votacao10++;
                                        elseif($get["heteroavaliacao"] == 11)
                                            $votacao11++;
                                        elseif($get["heteroavaliacao"] == 12)
                                            $votacao12++;
                                        elseif($get["heteroavaliacao"] == 13)
                                            $votacao13++;
                                        elseif($get["heteroavaliacao"] == 14)
                                            $votacao14++;
                                        elseif($get["heteroavaliacao"] == 15)
                                            $votacao15++;
                                        elseif($get["heteroavaliacao"] == 16)
                                            $votacao16++;
                                        elseif($get["heteroavaliacao"] == 17)
                                            $votacao17++;
                                        elseif($get["heteroavaliacao"] == 18)
                                            $votacao18++;
                                        elseif($get["heteroavaliacao"] == 19)
                                            $votacao19++;
                                        else
                                            $votacao20++;
                                    }
                                ?><br/><br/><br/>
                                <canvas id="mycanvas" width="500" height="500" style="display: block; margin-right: auto; margin-left: auto;"></canvas>
                                <script>
                                    $(document).ready(function() {
                                        var ctx = $("#mycanvas").get(0).getContext("2d");

                                        var data = [
                                            {
                                                value: <?=(($votacao1 * 360) / 24) ?>,
                                                color: "cornflowerblue",
                                                highlight: "lightskyblue",
                                                label: "Nota 1: <?=$votacao1?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao2 * 360) / 24) ?>,
                                                color: "lightgreen",
                                                highlight: "yellowgreen",
                                                label: "Nota 2: <?=$votacao2?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao3 * 360) / 24) ?>,
                                                color: "orange",
                                                highlight: "darkorange",
                                                label: "Nota 3: <?=$votacao3?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao4 * 360) / 24) ?>,
                                                color: "cornflowerblue",
                                                highlight: "lightskyblue",
                                                label: "Nota 4: <?=$votacao4?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao5 * 360) / 24) ?>,
                                                color: "lightgreen",
                                                highlight: "yellowgreen",
                                                label: "Nota 5: <?=$votacao5?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao6 * 360) / 24) ?>,
                                                color: "orange",
                                                highlight: "darkorange",
                                                label: "Nota 6: <?=$votacao6?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao7 * 360) / 24) ?>,
                                                color: "cornflowerblue",
                                                highlight: "lightskyblue",
                                                label: "Nota 7: <?=$votacao7?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao8 * 360) / 24) ?>,
                                                color: "lightgreen",
                                                highlight: "yellowgreen",
                                                label: "Nota 8: <?=$votacao8?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao9 * 360) / 24) ?>,
                                                color: "orange",
                                                highlight: "darkorange",
                                                label: "Nota 9: <?=$votacao9?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao10 * 360) / 24) ?>,
                                                color: "cornflowerblue",
                                                highlight: "lightskyblue",
                                                label: "Nota 10: <?=$votacao10?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao11 * 360) / 24) ?>,
                                                color: "lightgreen",
                                                highlight: "yellowgreen",
                                                label: "Nota 11: <?=$votacao11?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao12 * 360) / 24) ?>,
                                                color: "orange",
                                                highlight: "darkorange",
                                                label: "Nota 12: <?=$votacao12?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao13 * 360) / 24) ?>,
                                                color: "cornflowerblue",
                                                highlight: "lightskyblue",
                                                label: "Nota 13: <?=$votacao13?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao14 * 360) / 24) ?>,
                                                color: "lightgreen",
                                                highlight: "yellowgreen",
                                                label: "Nota 14: <?=$votacao14?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao15 * 360) / 24) ?>,
                                                color: "orange",
                                                highlight: "darkorange",
                                                label: "Nota 15: <?=$votacao15?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao16 * 360) / 24) ?>,
                                                color: "cornflowerblue",
                                                highlight: "lightskyblue",
                                                label: "Nota 16: <?=$votacao16?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao17 * 360) / 24) ?>,
                                                color: "lightgreen",
                                                highlight: "yellowgreen",
                                                label: "Nota 17: <?=$votacao17?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao18 * 360) / 24) ?>,
                                                color: "orange",
                                                highlight: "darkorange",
                                                label: "Nota 18: <?=$votacao18?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao19 * 360) / 24) ?>,
                                                color: "cornflowerblue",
                                                highlight: "lightskyblue",
                                                label: "Nota 19: <?=$votacao19?> votantes"
                                            },
                                            {
                                                value: <?=(($votacao20 * 360) / 24) ?>,
                                                color: "lightgreen",
                                                highlight: "yellowgreen",
                                                label: "Nota 20: <?=$votacao20?> votantes"
                                            },
                                        ];

                                        var piechart = new Chart(ctx).Pie(data);
                                    });
                                </script>
                                <br/><br/>
                                <table class="table table-striped"> 
                                    <thead> 
                                        <tr> 
                                            <th>#</th> 

                                            <th>Votante</th> 
                                            <th>Heteroavaliação</th> 
                                            <th>Comentários</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $select = $mysqli->query("SELECT * FROM votacao ORDER BY ID");
                                            $row = $select->num_rows;
                                            if($row > 0) {
                                                while($get = $select->fetch_array()) {
                                                    $votante = $get["votante"];
                                                    $nome = $mysqli->query("SELECT username FROM users WHERE nome = '$votante'");
                                                    $getNome = $nome->fetch_array();
                                        ?>
                                                    <tr 
                                                        <?php 
                                                            switch ($get["heteroavaliacao"]) {
                                                                case 1:
                                                                case 2:
                                                                case 3:
                                                                case 4:
                                                                    echo "class='danger'";
                                                                    break;
                                                                case 5:
                                                                case 6:
                                                                case 7:
                                                                case 8:
                                                                case 9:
                                                                    echo "class='warning'";
                                                                    break;
                                                                case 10:
                                                                case 11:
                                                                case 12:
                                                                case 13:
                                                                case 14:
                                                                case 15:
                                                                case 16:
                                                                    echo "class='info'";
                                                                    break;
                                                                default:
                                                                    echo "class='success'";
                                                                    break;
                                                            }
                                                        ?>
                                                    > 
                                                        <th scope="row"><?=$get["ID"]?></th>
                                                        <td><img src="../images/<?=$getNome[0]?>.jpg" style="width: 50px; display: inline-block;" class="img-circle img-responsive">&nbsp;&nbsp;<?=$get["votante"]?></td>
                                                        <td><?=$get["heteroavaliacao"]?></td>
                                                        <td><?=$get["comentarios"]?></td>
                                                    </tr>
                                        <?php
                                                }
                                            } else {
                                        ?>
                                            <h4> Não há valores da votação... <br/></h4>
                                        <?php
                                            }
                                        ?>
                                    </tbody> 
                                </table>
                            </div> <!-- /.panel-body -->
                        </div> <!-- /#collapseOne -->
                    </div> <!-- /.panel -->
                </div> <!-- /.panel-group -->

            </section> <!-- /#dashboard -->
        </section> <!-- /#content -->
    </body>
</html>