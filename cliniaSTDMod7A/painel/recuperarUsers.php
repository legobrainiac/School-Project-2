<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    include("../util.php");
    $nomePagina = "Recuperar Utilizadores";
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
                                            if(isset($_POST["optOrdenar"]))
                                                $order = $_POST["optOrdenar"];
                                            else
                                                $order =  'ID';
                                            $select = $mysqli->query("SELECT * FROM users WHERE ativo=0 ORDER BY $order");
                                            $row = $select->num_rows;
                                            if($row > 0) {
                                                while($get = $select->fetch_array()) {
                                                    if($get["ativo"] == 0) {
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
                                                            <a onclick="deleteUser('<?=$get["nome"]?>', '<?=$get["ID"]?>')" style="color: #000; text-decoration: none;"><i class="fa fa-user-plus"></i></a>
                                                        </td><?php } ?>
                                                    </tr>
                                        <?php
                                                    }
                                                }
                                            } else {
                                        ?>
                                            <h4> Nenhum utilizador registado. <br/></h4>
                                        <?php
                                            }
                                        ?>
                                    </tbody> 
                                </table>
                                <!--<div class="pull-right">-->
                                    <form class="form-horizontal" method="POST" action="" name="frmOrder">
                                        <label for="optOrderBy" class="col-sm-10 control-label"><b>Ordenar por:</b></label>
                                        <div class="col-sm-2">
                                            <select name="optOrdenar" onchange="javascript:frmOrder.submit()" class="form-control">
                                                <option value="ID"  <?php if($order == "ID") {echo "selected='selected'"; }?>>ID</option>
                                                <option value="username" <?php if($order == "username") {echo "selected='selected'"; }?>>Username</option>
                                                <option value="nome" <?php if($order == "nome") {echo "selected='selected'"; }?>>Nome</option>
                                                <option value="email" <?php if($order == "email") {echo "selected='selected'"; }?>>Email</option>
                                                <option value="dataNascimento" <?php if($order == "dataNascimento") {echo "selected='selected'"; }?>>Data de Nascimento</option>
                                                <option value="morada" <?php if($order == "morada") {echo "selected='selected'"; }?>>Morada</option>
                                                <option value="telemovel" <?php if($order == "telemovel") {echo "selected='selected'"; }?>>Telemovel</option>
                                            </select>
                                        </div>
                                    </form>
                                <!--</div>.-->
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
        if(confirm('Tem a certeza que pretende recuperar o utilizador ' + name + '?')) {
            window.location = "delete.php?func=recup&table=users&id="+id;
        }
    }
</script>