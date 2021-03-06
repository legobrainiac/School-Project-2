<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    include("../util.php");
    $nomePagina = "Consultas Agendadas";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?=$nomePagina." > +STD > ". $siteTitle?></title>
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
                                            <th>Clinica</th> 
                                            <th>Especialidade</th>
                                            <?php
                                                if($permissao == 2)
                                                    echo "<th>Utente</th>";
                                                else
                                                    echo "<th>Médico</th>";
                                            ?>
                                            <th>Data e Hora</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($permissao == 2) //medico
                                                $select = $mysqli->query("SELECT * FROM consultas WHERE medico = '$nome' AND ativo=1");
                                            else
                                                $select = $mysqli->query("SELECT * FROM consultas WHERE nome = '$nome' AND ativo=1");
                                            $row = $select->num_rows;
                                            if($row > 0) {
                                                while($get = $select->fetch_array()) {
                                                  if(!verificar_data($get["data"])){
                                        ?>  
                                                    <tr> 
                                                        <td><?=$get["clinica"]?></td>
                                                        <td><?=$get["especialidade"]?></td>
                                                        
                                                        <?php 
                                                            if($permissao == 2) //medico
                                                                echo "<td>".$get['nome']."</td>";
                                                            else
                                                                echo "<td>".$get['medico']."</td>";
                                                        ?>
                                                        <td><?=$get["data"]." às ".$get["hora"][0].$get["hora"][1].$get["hora"][2].$get["hora"][3].$get["hora"][4]?></td>
                                                        <td>
                                                            <a style="color: #000; text-decoration: none;" href="editarConsulta.php?id=<?=$get['ID']?>" title="Edit this profile"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                                            <a onclick="deleteUser('<?=$get["data"]?>', '<?=$get["ID"]?>')" style="color: #000; text-decoration: none;"><i class="fa fa-trash-o"></i></a>
                                                        </td>
                                                    </tr>
                                        <?php
                                                  }
                                                }
                                            } else {
                                        ?>
                                            <h4> Nenhuma Consulta.. <br/></h4>
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
    function deleteUser(data, id) {
        if(confirm('Tem a certeza que pretende desmarcar a consulta do dia ' + data + '?')) {
            window.location = "delete.php?table=consultas&id="+id;
        }
    }
</script>