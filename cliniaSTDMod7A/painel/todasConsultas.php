<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    include("../util.php");
    $nomePagina = "Todos as Consultas";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?=$nomePagina." > +STD > ".$siteTilte?>  </title>
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
                        <li><a href="allUsers.php">Consultas</a></li>
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
                                <table class="table table-striped"> 
                                    <thead> 
                                        <tr> 
                                            <th>#</th> 
                                            <th>Clinica</th>
                                            <th>Nome</th> 
                                            <th>Especialidade</th> 
                                            <th>Data e Hora</th>
                                            <th>Médico</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 0;
                                            $select = $mysqli->query("SELECT * FROM consultas ORDER BY ID ASC");
                                            $row = $select->num_rows;
                                            if($row > 0) {
                                                while($get = $select->fetch_array()) {
                                        ?>
                                                    <tr> 
                                                        <th scope="row"><?=$get["ID"]?></th>
                                                        <td><?=$get["clinica"]?></td>
                                                        <td><?=$get["nome"]?></td>
                                                        <td><?=$get["especialidade"]?></td>
                                                        <td><?=$get["data"]." às ".$get["hora"][0].$get["hora"][1].$get["hora"][2].$get["hora"][3].$get["hora"][4]?></td>
                                                        <td><?=$get["medico"]?></td>
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

<script type="text/javascript">
    function deleteUser(name, id) {
        if(confirm('Tem a certeza que pretende eliminar o utilizador ' + name + '?')) {
            window.location = "delete.php?table=users&id="+id;
        }
    }
</script>