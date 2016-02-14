<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    include("../util.php");
    if($permissao != 1)
        header('Location: index.php');
    $nomePagina = "Contactos";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php echo "$nomePagina > +STD > $siteTitle"; ?></title>
        <?=$headerContentPainel?>
        <?php 
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
                            <td class="right_divider" width="71%"><span class="glyphicon glyphicon-info-sign"></span> Bem-Vindo de Volta, <?php echo " <b>$nome</b>!"?></td>
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
                                    <i class="fa fa-comments"></i>&nbsp;<?=$nomePagina?>
                            </h4> <!-- /.panel-title -->
                        </div> <!-- /.panel-heading -->
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body table-responsive" style="color:#000">
                                <table class="table table-striped"> 
                                    <thead> 
                                        <tr> 
                                            <th>#</th> 
                                            <th>Nome</th>
                                            <th>Email</th> 
                                            <th>Assunto</th> 
                                            <th>Mensagem</th>
                                            <th>Data</th> 
                                            <th>Quer ser contactado?</th> 
                                            <th>Contactado?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 0;
                                            $select = $mysqli->query("SELECT * FROM contactos ORDER BY ID ASC");
                                            $row = $select->num_rows;
                                            if($row > 0) {
                                                while($get = $select->fetch_array()) {
                                        ?>
                                                    <tr <?php if($get["querSerContactado"] == 1 && $get["contactada"] == 0) echo "class='danger'"; elseif ($get["querSerContactado"] == 1 && $get["contactada"] == 1) echo "class='success'"; elseif($get["contactada"] == 1) echo "class='info'";?>> 
                                                        <th scope="row"><?=$get["ID"]?></th>
                                                        <td><?=$get["nome"]?></td>
                                                        <td><?=$get["email"]?></td>
                                                        <td><?=$get["assunto"]?></td>
                                                        <td><?=$get["mensagem"]?></td>
                                                        <td><?=$get["data"]?></td>
                                                        <td><?php if($get["querSerContactado"] == 0) echo "No"; else echo "Yes";?></td>
                                                        <td><?php if($get["contactada"] == 0) echo "No"; else echo "Yes";?></td>
                                                    </tr>
                                        <?php
                                                }
                                            } else {
                                        ?>
                                            <h4> There is no message.. <br/></h4>
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