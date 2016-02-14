<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    include("../util.php");
    $nomePagina = "Todos os Utilizadores";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> All User's > Control Panel > Ahriru Productions </title>
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
                                            <th>Photo</th>
                                            <th>Username</th> 
                                            <th>Name</th> 
                                            <th>E-mail</th>
                                            <th>Data de Nascimento</th> 
                                            <th>Morada</th> 
                                            <th>Telemóvel</th>
                                            <?php if($permissao == 1) { ?>
                                                <th>Permissão</th> 
                                                <th>Opções</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 0;
                                            $select = $mysqli->query("SELECT * FROM users ORDER BY ID ASC");
                                            $row = $select->num_rows;
                                            if($row > 0) {
                                                while($get = $select->fetch_array()) {
                                                    if($get["ativo"] == 1) {
                                        ?>
                                                    <tr> 
                                                        <th scope="row"><?=$get["ID"]?></th>
                                                        <td><img src="../images/<?=$get["username"]?>.jpg" style="width: 50px;" class="img-circle img-responsive"></td>
                                                        <td><?=$get["username"]?></td>
                                                        <td><?=$get["nome"]?></td>
                                                        <td><?=$get["email"]?></td>
                                                        <td><?=$get["dataNascimento"]?></td>
                                                        <td><?=$get["morada"]?></td>
                                                        <td><?=$get["telemovel"]?></td>
                                                        <?php if($permissao == 1) { ?><td><?=$get["permissoes"]?></td> 
                                                        <td style="text-align: center;">
                                                            <a style="color: #000; text-decoration: none;" href="edit_profile.php?id=<?=$get['ID']?>" title="Edit this profile"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                                            <a onclick="deleteUser('<?=$get["nome"]?>', '<?=$get["ID"]?>')" style="color: #000; text-decoration: none;"><i class="fa fa-user-times"></i></a>
                                                        </td><?php } ?>
                                                    </tr>
                                        <?php
                                                    }
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