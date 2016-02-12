<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    $error = false;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> All User's > Control Panel > Ahriru Productions </title>
        <link rel="icon" type="image/png" href="../images/small_icon.png" /> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style_panel.css" rel="stylesheet">
        <link href="http://getbootstrap.com/examples/offcanvas/offcanvas.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/script.js"></script>
        <script src="http://getbootstrap.com/examples/offcanvas/offcanvas.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <?php 
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
                            <td onclick="csgag()" class="right_divider" style="font-size: 14pt; text-indent: 7px;" width="20.5%"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;DASHBORD</td>
                            <td class="right_divider" width="71%"><span class="glyphicon glyphicon-info-sign"></span> Bem-Vindo de volta, <?php echo " <b>$nome</b>!"?></td>
                        </tr>
                    </table>
                </div> <!-- #header -->

                <div id="path">
                    <ol class="breadcrumb">
                        <li><span class="glyphicon glyphicon-home"></span></li>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="allUsers.php">Utilizadores</a></li>
                        <li class="active">Todos os Utilizadores</li>
                    </ol>
                </div> <!-- path -->

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                    <i class="fa fa-users"></i>&nbsp;Todos os Utilizadores
                            </h4>
                        </div> <!-- /.panel-heading -->
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
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
                                            <th>Redes Sociais</th> 
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
                                                        <td><?=$get["linkFb"]?></td>
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