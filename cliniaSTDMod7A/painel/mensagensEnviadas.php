<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    include("../util.php");
    $nomePagina = "Mensagens Enviadas";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php echo "$nomePagina > +STD > $siteTitle";?></title>
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
                                <table class="table table-striped"> 
                                    <thead> 
                                        <tr> 
                                            <th>#</th> 
                                            <th>De</th>
                                            <th>Mensagem</th> 
                                            <th>Data</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $select = $mysqli->query("SELECT * FROM mensagens WHERE emissor = '$username' ORDER BY ID ASC");
                                            $row = $select->num_rows;
                                            if($row > 0) {
                                                while($get = $select->fetch_array()) {
                                        ?>
                                                <tr> 
                                                    <th scope="row"><?=$get["ID"]?></th>
                                                    <td><?=$get["emissor"]?></td>
                                                    <td><?=$get["mensagem"]?></td>
                                                    <td><?=$get["data"]?></td>  
                                                </tr>
                                        <?php
                                                }
                                            } else {
                                        ?>
                                            <h4> Nenhum utilizador registado. <br/></h4>
                                            <div>
                                                <a href="addUser.php">Adicione um.</a>
                                            </div>
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