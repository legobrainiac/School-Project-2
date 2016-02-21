<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    include("../util.php");
    $nomePagina = "Todos as Mensagens";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?=$nomePagina." > +STD > ".$siteTitle?></title>
        <?php 
            echo $headerContentPainel;
            $username = $_SESSION["user"]; 
        ?>
    </head>

    <body id="allUser">
        <section id="navbar_sup">
            <?php include("navbarSup.php") ?>
        </section> <!-- #navbar_sup -->
        <section id="content">
            <section id="navbar_lat">
                <?php include("navbarLat.php") ?>
            </section>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="allUsers.php">Utilizadores</a></li>
                        <li class="active"><?=$nomePagina?></li>
                    </ol>
                </div> <!-- path -->

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                    <i class="fa fa-users"></i>&nbsp;<?=$nomePagina?>
                            </h4>
                        </div> <!-- /.panel-heading -->
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <a href="adduser.php" title="Adicionar Urilizador"><button class="pull-right btn btn-success"><i class="fa fa-user-plus"></i>&nbsp;Adicionar Utilizador</button></a>
                                <table class="table table-striped"> 
                                    <thead> 
                                        <tr> 
                                            <th>#</th> 
                                            <th>De</th>
                                            <th>Para</th> 
                                            <th>Mensagem</th> 
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $select = $mysqli->query("SELECT * FROM mensagens ORDER BY ID ASC");
                                            $row = $select->num_rows;
                                            if($row > 0) {
                                                while($get = $select->fetch_array()) {
                                        ?>
                                                <?php
                                                    $nomeEmissor  = $get["emissor"];
                                                    $nomeRecetor  = $get["recetor"];
                                                    $dadosEmissor = $mysqli->query("SELECT * FROM users WHERE username='$nomeEmissor'");
                                                    $cenas = $dadosEmissor->fetch_array();
                                                    $dadosRecetor = $mysqli->query("SELECT * FROM users WHERE username='$nomeRecetor'");
                                                    $cenas2 = $dadosRecetor->fetch_array();
                                                ?>
                                                <tr> 
                                                    <th scope="row"><?=$get["ID"]?></th>
                                                    <td><?=$cenas["nome"]?></td>
                                                    <td><?=$cenas2["nome"]?></td>
                                                    <td><?=$get["mensagem"]?></td>
                                                    <td><?=$get["data"]?></td>
                                                </tr>
                                        <?php
                                                }
                                            } else {
                                        ?>
                                            <h4> Nenhuma mensagem. <br/></h4>
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

<script type="text/javascript">
    function deleteUser(name, id) {
        if(confirm('Tem a certeza que pretende eliminar o utilizador ' + name + '?')) {
            window.location = "delete.php?table=users&id="+id;
        }
    }
</script>