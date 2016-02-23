<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    include("../util.php");
    $nomePagina = "Editar Perfil";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php echo "$nomePagina > +STD > $siteTitle"; ?></title>
        <?=$headerContentPainel?>
        <?php 
            $username = $_SESSION["user"];

            $idUser = $_GET['id'];

            if($id != $idUser && $permissao != 1) {
                alert("Não tem permissão para alterar este perfil");
                header('Location: index.php');
            }
            $check = $mysqli->query("SELECT * FROM users WHERE ID = '$idUser'");
            $row   = $check->num_rows;
            if($row) {
                $dados = $check->fetch_array();
                $_username = $dados["username"];
                $_password = $dados["password"];
                $_name = $dados["nome"];
                $_mail = $dados["email"];
                $_morada = preg_split("<br />", $dados["morada"]);
                $_dataNascimento = $dados["dataNascimento"];
                $_telemovel = $dados["telemovel"];
                $_linkFb = $dados["linkFb"];
            }

            $chars = array("<",">");

            $valueNome           = isset($_POST["txtNome"]) ? $_POST["txtNome"] : $_name;
            $valueUsername       = isset($_POST["txtUsername"]) ? $_POST["txtUsername"] : $_username;
            $valueEmail          = isset($_POST["txtEmail"]) ? $_POST["txtEmail"] : $_mail;
            $valueRua            = isset($_POST["txtRua"]) ? $_POST["txtRua"] : str_replace($chars, "", $_morada[0]);
            $valueLocalidade     = isset($_POST["txtLocalidade"]) ? $_POST["txtLocalidade"] : str_replace($chars, "", $_morada[1]);
            $valueCodPostal      = isset($_POST["txtCodigoPostal"]) ? $_POST["txtCodigoPostal"] : str_replace($chars, "", $_morada[2]);
            $valueTelemovel      = isset($_POST["txtTelemovel"]) ? $_POST["txtTelemovel"] : $_telemovel;
            $valueDataNascimento = isset($_POST["txtDataNascimento"]) ? $_POST["txtDataNascimento"] : $_dataNascimento;
            $valueLinkFb         = isset($_POST["txtLinkFb"]) ? $_POST["txtLinkFb"] : $_linkFb;
        ?>
    </head>

    <body>
        <section id="navbar_sup">
            <?php include("navbarSup.php") ?>
        </section>
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
                </div>
                <div id="path">
                    <ol class="breadcrumb">
                        <li><span class="glyphicon glyphicon-home"></span></li>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Utilizadores</a></li>
                        <li class="active"><?=$nomePagina;?></li>
                    </ol>
                </div>
                <div class="panel-group alert fade in" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                      <h4 class="panel-title">
                      <?=$nomePagina;?>
                        <button style="font-size: 11pt" type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                        <a role="button" class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <button style="font-size: 11pt" type="button" class="close">
                            <span aria-hidden="true" style=""><i class="fa fa-chevron-up"></i></span>&nbsp;&nbsp;
                          </button>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                     <div class="panel-body">
                        <div style="text-align: center" class="col-md-3">
                            <img src="../images/<?=$_username?>.jpg" class="img-circle img-profile_sqrt" id="newprofilephoto" />
                            <br /><h6 id="bottomImage">Upload photo...</h6>

                            <div class="row">
                                <div class="input-group">
                                    <input type="text" id="uploadFile" disabled="disabled" class="form-control" placeholder="Browse...">
                                    <span class="input-group-btn">
                                        <span class="fileUpload btn btn-primary">
                                        <span id="up_txt">Upload</span>
                                            <form method="POST" action="" enctype="multipart/form-data">
                                            <input id="uploadBtn" type="file" class="upload" name="imgPerfil"/>
                                            <!--<input type="file" name="file">-->
                                            <script type="text/javascript">
                                                document.getElementById("uploadBtn").onchange = function () {
                                                    var file = this.value;
                                                    var path = file;
                                                    document.getElementById("uploadFile").value = file;
                                                    document.getElementById("newprofilephoto").src = "../images/uploadTOcomplete.gif";
                                                    document.getElementById("bottomImage").innerHTML = "<b>Don't forget</b>: Save the changes ...";
                                                };
                                            </script>
                                        </span> <!-- /#up_txt -->
                                    </span> <!-- /.input-group-btn -->
                                </div> <!-- input-group -->
                            </div> <!-- /.row -->
                        </div> <!-- /.col-md-3 -->

                        <div class="col-md-9 personal-info">
                            <h3>Informações Pessoais</h3>

                            <div class="form-horizontal">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Nome:</label>
                                        <div class="col-lg-8">
                                            <?php
                                                if(isset($_POST["btnAddUser"]) && empty($_POST["txtNome"]))
                                                {
                                                    $haerro = true;
                                                    erroForm("Por favor, introduza um nome para o utilizador.");
                                                }
                                            ?>
                                            <input class="form-control" placeholder="Nome" type="text" name="txtNome" value="<?=$valueNome?>">
                                        </div> <!-- /.col-lg-8 -->
                                    </div> <!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Email:</label>
                                        <div class="col-lg-8">
                                            <?php
                                                if(isset($_POST["btnAddUser"]) && empty($_POST["txtEmail"]))
                                                {
                                                    $haerro = true;
                                                    erroForm("Por favor, introduza um email para o utilizador.");
                                                }
                                            ?>
                                            <input class="form-control" placeholder="E-mail" type="email" name="txtEmail" value="<?=$valueEmail?>">
                                        </div> <!-- .col-lg-8 -->
                                    </div> <!-- .form-group -->

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Password:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" placeholder="11111122333" type="password" name="txtPassword">
                                        </div> <!-- .col-lg-8 -->
                                    </div> <!-- .form-group -->

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Confirme a password:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" type="password" name="txtConfPass">
                                        </div> <!-- .col-lg-8 -->
                                    </div> <!-- .form-group -->

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Morada:</label>
                                        <div class="col-md-8">
                                            <?php
                                                if(isset($_POST["btnAddUser"]) && (empty($_POST["txtRua"]) || empty($_POST["txtLocalidade"]) || empty($_POST["txtCodigoPostal"])))
                                                {
                                                    $haerro = true;
                                                    erroForm("Por favor, introduza a morada do utilizador.");
                                                }
                                            ?>
                                            <input class="form-control" placeholder="Rua" type="text" name="txtRua" style="margin-bottom:10px;" value="<?=$valueRua?>">
                                            <input class="form-control" placeholder="Localidade" type="text" name="txtLocalidade" style="margin-bottom:10px;" value="<?=$valueLocalidade?>">
                                            <input class="form-control" placeholder="Código Postal" type="text" name="txtCodigoPostal" value="<?=$valueCodPostal?>">
                                        </div> <!-- .col-lg-8 -->
                                    </div> <!-- .form-group -->

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Telemóvel:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" placeholder="Telemóvel" type="text" name="txtTelemovel" value="<?=$valueTelemovel?>">
                                        </div> <!-- .col-lg-8 -->
                                    </div> <!-- .form-group -->

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Data de Nascimento:</label>
                                        <div class="col-md-8">
                                            <?php
                                                if(isset($_POST["btnAddUser"]) && empty($_POST["txtDataNascimento"]))
                                                {
                                                    $haerro = true;
                                                    erroForm(" Por favor, introduza uma data de nascimento para o utilizador.");
                                                }
                                            ?>
                                            <input class="form-control" type="date" name="txtDataNascimento" value="<?=$valueDataNascimento?>">
                                        </div> <!-- .col-lg-8 -->
                                    </div> <!-- .form-group -->

                                    <?php
                                        if($permissao == 1) { ?>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Permissões:</label>
                                                <div class="col-md-8">
                                                    <select name="txtPermissoes" class="form-control">
                                                        <option value="1">Administrador</option>
                                                        <option value="2">Editor</option>
                                                        <option value="3">Cliente</option>
                                                    </select>
                                                </div> <!-- .col-lg-8 -->
                                            </div> <!-- .form-group -->
                                        <?php } ?>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Facebook URL:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" placeholder="Link do Facebook (opcional)" type="text" name="txtLinkFb" value="<?=$valueLinkFb?>">
                                        </div> <!-- .col-lg-8 -->
                                    </div> <!-- .form-group -->

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-8">
                                            <input class="btn btn-primary" value="Registar Utilizador" type="submit" name="btnAddUser">
                                            <input class="btn btn-default" value="Cancelar" type="reset">
                                        </div> <!-- .col-lg-8 -->
                                    </div>  <!-- .form-group -->
                            </form>
                        </div> <!-- /.col-md-9 -->

                    </div> <!-- .panel-body -->
                  </div>
            </section>
        </section>
    </body>
</html>

<?php 
    if(isset($_POST["btnAddUser"]) && !$haerro) {
        $passwordIns    = sha1(sha1(md5(sha1($_POST["txtPassword"])))); 
        $nameIns        = $_POST["txtNome"];
        $emailIns       = $_POST["txtEmail"];
        $moradaIns      = $_POST["txtRua"] . "<br />" . $_POST["txtLocalidade"] . "<br />" . $_POST["txtCodigoPostal"];
        $birthdayIns    = $_POST["txtDataNascimento"];
        $permissionIns  = $_POST["txtPermissoes"];
        $telemovelIns   = $_POST["txtTelemovel"];
        $linkFbIns      = $_POST["txtLinkFb"];

        if(isset($passwordIns)) $mysqli->query("UPDATE users SET password = '$passwordIns' WHERE ID = '$idUser'");
        if($nameIns != $_name) $mysqli->query("UPDATE users SET nome = '$nameIns' WHERE ID = '$idUser'");
        if($emailIns != $_mail) $mysqli->query("UPDATE users SET email = '$emailIns' WHERE ID = '$idUser'");
        if($moradaIns != $_morada) $mysqli->query("UPDATE users SET morada = '$cityIns' WHERE ID = '$idUser'");
        if($birthdayIns != $_dataNascimento) $mysqli->query("UPDATE users SET dataNascimento = '$birthdayIns' WHERE ID = '$idUser'");
        if($telemovelIns != $_telemovel) $mysqli->query("UPDATE users SET telemovel = '$telemovelIns' WHERE ID = '$idUser'");
        if($linkFbIns != $_link_fb) $mysqli->query("UPDATE users SET linkFb = '$linkFbIns' WHERE ID = '$idUser'");

        if (isset($_FILES['imgPerfil'])) {
            $file = $_FILES['imgPerfil'];

            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $file_size = $file['size'];
            $file_error = $file['error'];
            $filePath = realpath($file_tmp);

            $file_ext = explode('.', $file_name);   
            $file_ext = strtolower(end($file_ext));

            $allowed = array('jpg', 'png');

            if (in_array($file_ext, $allowed)) {
                if($file_error === 0) {
                    $file_destination = "../images/$usernameIns.jpg";
                    move_uploaded_file($file_tmp, $file_destination);
                }
            }
        }
        echo "<script>alert('Alterações Guardadas!');</script>";
    }
?>