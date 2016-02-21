<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    include("../util.php");
    $nomePagina = "Enviar Mensagem";
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
                        <li><a href="#">Mensagens</a></li>
                        <li class="active"><?=$nomePagina?></li>
                    </ol>
                </div> <!-- path -->

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <span class="glyphicon glyphicon-comment"></span>&nbsp;<?php echo "$nomePagina"; ?>
                            </h4> <!-- /.panel-title -->
                        </div> <!-- /.panel-heading -->
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label for="clinica">Para:</label>
                                        <select class="form-control" id="cboClinicas" name="optDestinatario">
                                        <?php 
                                            $nomesUtilizadores = $mysqli->query("SELECT * FROM users WHERE permissoes != 4 AND username != '$username'");
                                            if($nomesUtilizadores->num_rows > 0) {
                                                while($dadosDest = $nomesUtilizadores->fetch_array()) {
                                        ?>
                                                    <option value="<?=$dadosDest['username']?>"><?=$dadosDest["nome"]?></option>
                                        <?php 
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="clinica">Mensagem:</label>
                                        <textarea class="form-control" rows="10" name="txtMensagem"></textarea>
                                    </div>
                                    <input class="btn btn-primary" value="Enviar mensagem..." type="submit" name="btnEnviarMensagem">
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
    if(isset($_POST["btnEnviarMensagem"])) {
        $from     = $username;
        $to       = $_POST["optDestinatario"];
        $mensagem = $_POST["txtMensagem"];
        $data     = date('Y-m-d H:i');

        $enviar = $mysqli->query("INSERT INTO mensagens(emissor, recetor, mensagem, data) VALUES('$from', '$to', '$mensagem', '$data')");

        if($enviar)
            alert("Mensagem Enviada!");
        else
            alert("Erro ao enviar a mensagem");

    }
?>