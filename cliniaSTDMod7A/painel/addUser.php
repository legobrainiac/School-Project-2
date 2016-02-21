<?php
    include("../connection.php");
    session_start();
    include("sairPagina.php");
    sairPagina();
    $haerro = false;
    include("../util.php");

    $valueNome           = isset($_POST["txtNome"]) ? $_POST["txtNome"] : "";
    $valueUsername       = isset($_POST["txtUsername"]) ? $_POST["txtUsername"] : "";
    $valueEmail          = isset($_POST["txtEmail"]) ? $_POST["txtEmail"] : "";
    $valueRua            = isset($_POST["txtRua"]) ? $_POST["txtRua"] : "";
    $valueLocalidade     = isset($_POST["txtLocalidade"]) ? $_POST["txtLocalidade"] : "";
    $valueCodPostal      = isset($_POST["txtCodigoPostal"]) ? $_POST["txtCodigoPostal"] : "";
    $valueTelemovel      = isset($_POST["txtTelemovel"]) ? $_POST["txtTelemovel"] : "";
    $valueDataNascimento = isset($_POST["txtDataNascimento"]) ? $_POST["txtDataNascimento"] : "";
    $valueLinkFb         = isset($_POST["txtLinkFb"]) ? $_POST["txtLinkFb"] : "";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Adicionar Utilizador > +STD > STD Psiquiatria </title>
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
            $check = $mysqli->query("SELECT * FROM users WHERE username='$username'");
            $row   = $check->num_rows;
            if($row) {
                $dados = $check->fetch_array();
                $id = $dados["ID"];
                $name = $dados["name"];
            }
        ?>
    </head>

    <body id="addUser">
            <section id="dashboard">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                    <i class="fa fa-user-plus"></i>&nbsp;Adicionar Utilizador
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div style="text-align: center" class="col-md-3">
                                    <img src="../images/admin.jpg" class="img-circle img-profile_sqrt" id="newprofilephoto" />
                                    <br /><h6 id="bottomImg">Carregar Foto...</h6>

                                    <div class="row">
                                        <div class="input-group">
                                            <input type="text" id="uploadFile" disabled="disabled" class="form-control" placeholder="Procurar...">
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
                                                            document.getElementById("bottomImg").innerHTML = "Não se esqueça de guardar as alterações..."
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
                                            <label class="col-md-3 control-label">Nome de utilizador:</label>
                                            <div class="col-md-8">
                                                <?php
                                                    if(isset($_POST["btnAddUser"]) && empty($_POST["txtUsername"]))
                                                    {
                                                        $haerro = true;
                                                        erroForm("Por favor, introduza um nome de utilizador.");
                                                    }

                                                    if(isset($_POST["btnAddUser"]) && !empty($_POST["txtUsername"]) && !empty($_POST["txtEmail"])) {
                                                        $email_tmp    = $_POST["txtEmail"];
                                                        $username_tmp = $_POST["txtUsername"]; 
                                                        $query = $mysqli->query("SELECT * FROM users WHERE email='$email_tmp' OR username='$username_tmp'");
                                                        $row = $query->num_rows;
                                                        if($row > 0) {
                                                            $error = true;
                                                            echo "
                                                                <div class='alert alert-warning' role='alert' style='font-size:10pt; margin-left: 0px;'>
                                                                <span class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span>
                                                                <span class='sr-only'>Erro:</span>
                                                                Utilizador ou e-mail já registrados.<br />
                                                                Por favor, introduza valores diferentes.
                                                                </div>  
                                                            ";
                                                        }
                                                    }
                                                ?>
                                                <input class="form-control" placeholder="Username" type="text" name="txtUsername" value="<?=$valueUsername?>">
                                            </div> <!-- .col-lg-8 -->
                                        </div> <!-- .form-group -->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password:</label>
                                            <div class="col-md-8">
                                                <?php
                                                    if(isset($_POST["btnAddUser"]) && empty($_POST["txtPassword"]))
                                                    {
                                                        $haerro = true;
                                                        erroForm("Por favor, introduza uma password para o utilizador.");
                                                    }
                                                ?>
                                                <input class="form-control" placeholder="11111122333" type="password" name="txtPassword">
                                            </div> <!-- .col-lg-8 -->
                                        </div> <!-- .form-group -->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Confirme a password:</label>
                                            <div class="col-md-8">
                                                <?php
                                                    if(isset($_POST["btnAddUser"]) && ($_POST["txtPassword"] != $_POST["txtConfPass"]))
                                                    {
                                                        $haerro = true;
                                                        erroForm("As duas password's não coincidem.<br/>Por razões de segurança, elas devem ser iguais...");
                                                    }
                                                ?>
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
                                                            <option value="2">Médico</option>
                                                            <option value="3">Utente</option>
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

                                    </div> <!-- .form-horizontal -->
                                    </form>
                                </div> <!-- /.col-md-9 -->

                            </div> <!-- .panel-body -->
                        </div> <!-- #collapseOne -->
                    </div> <!-- /.panel -->
                </div> <!-- /.panel-group -->

            </section> <!-- /#dashboard -->
        </section> <!-- /#content -->
    </body>
</html>

<?php
    if(isset($_POST["btnAddUser"]) && !$haerro) {
        $usernameIns    = $_POST["txtUsername"];
        $passwordIns    = sha1(sha1(md5(sha1($_POST["txtPassword"])))); 
        $nameIns        = $_POST["txtNome"];
        $emailIns       = $_POST["txtEmail"];
        $moradaIns      = $_POST["txtRua"] . "<br />" . $_POST["txtLocalidade"] . "<br />" . $_POST["txtCodigoPostal"];
        $birthdayIns    = $_POST["txtDataNascimento"];
        $permissionIns  = $_POST["txtPermissoes"];
        $telemovelIns   = $_POST["txtTelemovel"];
        $linkFbIns      = $_POST["txtLinkFb"];

        $query2 = $mysqli->query("INSERT INTO users(username, password, email, nome, DataNascimento, morada, telemovel, linkFb, permissoes, ativo) VALUES ('$usernameIns', '$passwordIns', '$emailIns', '$nameIns', '$birthdayIns', '$moradaIns', '$telemovelIns', '$linkFbIns', '$permissionIns','1')");
        if($query2)
            alert("Utilizador Registado!");
        else 
            alert("Erro ao registar utilizador.\nPor favor, tente de novo...");

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
                    $file_name_new = uniqid('', true) . '.' . $file_ext;
                    $file_destination = "../images/$usernameIns.jpg";
                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        //echo $file_destination;
                    }

                }
            }
        }
    }
?>