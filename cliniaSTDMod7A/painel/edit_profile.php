<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Control Panel > Ahriru Productions </title>
        <link rel="icon" type="image/png" href="../images/small_icon.png" /> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style_panel.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/entypo-icon.css">
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
                $dadosSession = $check->fetch_array();
                $name = $dadosSession["nome"];
            }

            $id = $_GET['id'];
            $check = $mysqli->query("SELECT * FROM users WHERE ID = '$id'");
            $row   = $check->num_rows;
            if($row) {
                $dados = $check->fetch_array();
                $_username = $dados["username"];
                $_password = $dados["password"];
                $_name = $dados["nome"];
                $_mail = $dados["email"];
                $_morada = $dados["morada"];
                $_dataNascimento = $dados["dataNascimento"];
                $_telemovel = $dados["telemovel"];
                $_linkFb = $dados["linkFb"];
            }
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
                            <td onclick="csgag()" class="right_divider" style="font-size: 14pt; text-indent: 7px;" width="20.5%"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;DASHBORD</td>
                            <td class="right_divider" width="71%"><span class="glyphicon glyphicon-info-sign"></span> Bem-Vindo de volta, <?php echo " <b>$_name</b>!"?></td>
                        </tr>
                    </table>
                </div>
                <div id="path">
                    <ol class="breadcrumb">
                        <li><span class="glyphicon glyphicon-home"></span></li>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Utilizadores</a></li>
                        <li class="active">Editar Utilizadores</li>
                    </ol>
                </div>
                <div class="panel-group alert fade in" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                      <h4 class="panel-title">
                      EDITAR PERFIL
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
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Name:</label>
                                            <div class="col-lg-8">
                                                <?php
                                                    if(isset($_POST["btnAddUser"]) && empty($_POST["txtName"])) {
                                                        $error = true;
                                                        echo "
                                                            <div class='alert alert-danger' role='alert' style='font-size:10pt; margin-left: 0px;'>
                                                            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                                            <span class='sr-only'>Error:</span>
                                                            Please, enter a name for the user.
                                                            </div>  
                                                        ";
                                                    }
                                                ?>
                                                <input class="form-control" value="<?=$_name?>" type="text" name="txtName">
                                            </div> <!-- /.col-lg-8 -->
                                        </div> <!-- /.form-group -->

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Email:</label>
                                            <div class="col-lg-8">
                                                <?php
                                                    if(isset($_POST["btnAddUser"]) && empty($_POST["txtEmail"])) {
                                                        $error = true;
                                                        echo "
                                                            <div class='alert alert-danger' role='alert' style='font-size:10pt; margin-left: 0px;'>
                                                            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                                            <span class='sr-only'>Error:</span>
                                                            Please, enter a email for the user.
                                                            </div>  
                                                        ";
                                                    }
                                                ?>
                                                <input class="form-control" value="<?=$_mail?>" type="email" name="txtEmail">
                                            </div> <!-- .col-lg-8 -->
                                        </div> <!-- .form-group -->

                                        <?php if($dadosSession["permission"] == 1) {?>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username:</label>
                                            <div class="col-md-8">
                                                <?php
                                                    if(isset($_POST["btnAddUser"]) && empty($_POST["txtUsername"])) {
                                                        $error = true;
                                                        echo "
                                                            <div class='alert alert-danger' role='alert' style='font-size:10pt; margin-left: 0px;'>
                                                            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                                            <span class='sr-only'>Error:</span>
                                                            Please, enter a username for the user account.
                                                            </div>  
                                                        ";
                                                    }
                                                ?>
                                                <input class="form-control" value="<?=$_username?>" type="text" name="txtUsername">
                                            </div> <!-- .col-lg-8 -->
                                        </div> <!-- .form-group -->
                                        <?php } ?>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password:</label>
                                            <div class="col-md-8">
                                                <input class="form-control" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" type="password" name="txtPassword">
                                            </div> <!-- .col-lg-8 -->
                                        </div> <!-- .form-group -->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Confirm password:</label>
                                            <div class="col-md-8">
                                                <?php
                                                    if(isset($_POST["btnAddUser"]) && ($_POST["txtPassword"] != $_POST["txtConfPass"])) {
                                                        $error = true;
                                                        echo "
                                                            <div class='alert alert-warning' role='alert' style='font-size:10pt; margin-left: 0px;'>
                                                            <span class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span>
                                                            <span class='sr-only'>Error:</span>
                                                            The two's password are different.<br/>
                                                            For safety reasons, these should be the same ...
                                                            </div>  
                                                        ";
                                                    }
                                                ?>
                                                <input class="form-control" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" type="password" name="txtConfPass">
                                            </div> <!-- .col-lg-8 -->
                                        </div> <!-- .form-group -->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Morada:</label>
                                            <div class="col-md-8">
                                                <?php
                                                    if(isset($_POST["btnAddUser"]) && empty($_POST["txtCity"])) {
                                                        $error = true;
                                                        echo "
                                                            <div class='alert alert-danger' role='alert' style='font-size:10pt; margin-left: 0px;'>
                                                            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                                            <span class='sr-only'>Error:</span>
                                                            Please, enter a City for the user.
                                                            </div>  
                                                        ";
                                                    }
                                                ?>
                                                <input class="form-control" placeholder="Rua" type="text" name="txtRua" style="margin-bottom:10px;" value="<?=$valueRua?>">
                                                <input class="form-control" placeholder="Localidade" type="text" name="txtLocalidade" style="margin-bottom:10px;" value="<?=$valueLocalidade?>">
                                                <input class="form-control" placeholder="Código Postal" type="text" name="txtCodigoPostal" value="<?=$valueCodPostal?>">
                                            </div> <!-- .col-lg-8 -->
                                        </div> <!-- .form-group -->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Information:</label>
                                            <div class="col-md-8">
                                                <?php
                                                    if(isset($_POST["btnAddUser"]) && empty($_POST["txtInformation"])) {
                                                        $error = true;
                                                        echo "
                                                            <div class='alert alert-danger' role='alert' style='font-size:10pt; margin-left: 0px;'>
                                                            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                                            <span class='sr-only'>Error:</span>
                                                            Please, enter a Information of the user.
                                                            </div>  
                                                        ";
                                                    }
                                                ?>
                                                <textarea class="form-control" name="txtInformation" rows="4"><?php echo $_information?></textarea>
                                            </div> <!-- .col-lg-8 -->
                                        </div> <!-- .form-group -->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Birthday:</label>
                                            <div class="col-md-8">
                                                <?php
                                                    if(isset($_POST["btnAddUser"]) && empty($_POST["txtCity"])) {
                                                        $error = true;
                                                        echo "
                                                            <div class='alert alert-danger' role='alert' style='font-size:10pt; margin-left: 0px;'>
                                                            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                                            <span class='sr-only'>Error:</span>
                                                            Please, enter a Birthday of the user.
                                                            </div>  
                                                        ";
                                                    }
                                                ?>
                                                <input class="form-control" type="date" value="<?=$_birthday?>" name="txtBirthday">
                                            </div> <!-- .col-lg-8 -->
                                        </div> <!-- .form-group -->

                                        <!--<?php if($dadosSession["permission"] == 1) {?>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Permission:</label>
                                                <div class="col-md-8">
                                                    <?php
                                                        /*if(isset($_POST["btnAddUser"]) && empty($_POST["txtPassword"])) {
                                                            $error = true;
                                                            echo "
                                                                <div class='alert alert-danger' role='alert' style='font-size:10pt; margin-left: 0px;'>
                                                                <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                                                <span class='sr-only'>Error:</span>
                                                                Please, enter a password for the user account.
                                                                </div>  
                                                            ";
                                                        }*/
                                                    ?>
                                                    <select name="txtPermission" class="form-control">
                                                        <option value="administrator">Administrator</option>
                                                        <option value="editor">Editor</option>
                                                    </select>
                                                </div> <!-- .col-lg-8 -->
                                            <!--</div> <!-- .form-group -->
                                        <!--<?php } ?>-->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Function:</label>
                                            <div class="col-md-8">
                                                <?php
                                                    if(isset($_POST["btnAddUser"]) && empty($_POST["txtFunction"])) {
                                                        $error = true;
                                                        echo "
                                                            <div class='alert alert-danger' role='alert' style='font-size:10pt; margin-left: 0px;'>
                                                            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                                            <span class='sr-only'>Error:</span>
                                                            Please, enter a function for the user.
                                                            </div>  
                                                        ";
                                                }
                                                ?>
                                                <input class="form-control" value="<?=$_function?>" type="text" name="txtFunction">
                                            </div> <!-- .col-lg-8 -->
                                        </div> <!-- .form-group -->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Joined:</label>
                                            <div class="col-md-8">
                                                <?php
                                                    if(isset($_POST["btnAddUser"]) && empty($_POST["txtJoined"])) {
                                                        $error = true;
                                                        echo "
                                                            <div class='alert alert-danger' role='alert' style='font-size:10pt; margin-left: 0px;'>
                                                            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                                            <span class='sr-only'>Error:</span>
                                                            Please, enter a joined date for the user.
                                                            </div>  
                                                        ";
                                                    }
                                                ?>
                                                <input class="form-control" type="date" value="<?=$_joined?>" name="txtJoined">
                                            </div> <!-- .col-lg-8 -->
                                        </div> <!-- .form-group -->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Facebook URL:</label>
                                            <div class="col-md-8">
                                                <input class="form-control" value="<?=$_link_fb?>" type="text" name="txtLinkFb">
                                            </div> <!-- .col-lg-8 -->
                                        </div> <!-- .form-group -->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Twitter URL:</label>
                                            <div class="col-md-8">
                                                <input class="form-control" value="<?=$_link_tw?>" type="text" name="txtLinkTw">
                                            </div> <!-- .col-lg-8 -->
                                        </div> <!-- .form-group -->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Github URL:</label>
                                            <div class="col-md-8">
                                                <input class="form-control" value="<?=$_link_gh?>" type="text" name="txtLinkGh">
                                            </div> <!-- .col-lg-8 -->
                                        </div> <!-- .form-group -->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-8">
                                                <input class="btn btn-primary" value="Update Profile »" type="submit" name="btnAddUser">
                                            </div> <!-- .col-lg-8 -->
                                        </div>  <!-- .form-group -->

                                    </div> <!-- .form-horizontal -->
                                    </form>
                                </div> <!-- /.col-md-9 -->

                            </div> <!-- .panel-body -->
                  </div>
            </section>
        </section>
    </body>
</html>

<?php 
    if(isset($_POST["btnAddUser"]) && !$error) {
        $usernameIns    = $_POST["txtUsername"];
        if($_POST["txtPassword"] != "") $passwordIns = md5(sha1(sha1(md5($_POST["txtPassword"])))); 
        $nameIns        = $_POST["txtName"];
        $emailIns       = $_POST["txtEmail"];
        $cityIns        = $_POST["txtCity"];
        $informationIns = $_POST["txtInformation"];
        $birthdayIns    = $_POST["txtBirthday"];
        $functionIns    = $_POST["txtFunction"];
        $joinedIns      = $_POST["txtJoined"];
        $linkFbIns      = $_POST["txtLinkFb"];
        $linkTwIns      = $_POST["txtLinkTw"];
        $linkGhIns      = $_POST["txtLinkGh"];

        if($usernameIns != $_username) $mysqli->query("UPDATE users SET username = '$usernameIns' WHERE ID = '$id';");
        if(isset($passwordIns)) {
            echo "<script>alert('ALTERAR!!!');</script>";
            $mysqli->query("UPDATE users SET password = '$passwordIns' WHERE ID = '$id'");
        }
        if($nameIns != $_name) $mysqli->query("UPDATE users SET name = '$nameIns' WHERE ID = '$id'");
        if($emailIns != $_mail) $mysqli->query("UPDATE users SET email = '$emailIns' WHERE ID = '$id'");
        if($cityIns != $_city) $mysqli->query("UPDATE users SET city = '$cityIns' WHERE ID = '$id'");
        if($informationIns != $information) $mysqli->query("UPDATE users SET information = '$informationIns' WHERE ID = '$id'");
        if($birthdayIns != $_birthday) $mysqli->query("UPDATE users SET birthday = '$birthdayIns' WHERE ID = '$id'");
        if($functionIns != $_function) $mysqli->query("UPDATE users SET function = '$functionIns' WHERE ID = '$id'");
        if($joinedIns != $_joined) $mysqli->query("UPDATE users SET joined = '$joinedIns' WHERE ID = '$id'");
        if($linkFbIns != $_link_fb) $mysqli->query("UPDATE users SET link_facebook = '$linkFbIns' WHERE ID = '$id'");
        if($linkTwIns != $_link_tw) $mysqli->query("UPDATE users SET link_twitter = '$linkTwIns' WHERE ID = '$id'");
        if($linkGhIns != $_link_gh) $mysqli->query("UPDATE users SET link_github = '$linkGhIns' WHERE ID = '$id'");

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
        echo "<script>alert('Saved changes!');</script>";
    }
?>