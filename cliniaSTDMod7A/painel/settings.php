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
        <title> Settings > Control Panel > Ahriru Productions </title>
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

            $check2 = $mysqli->query("SELECT * FROM site WHERE ID = 1");
            $row2   = $check2->num_rows;
            if($row2) {
                $dados2 = $check2->fetch_array();
                $siteTitle = $dados2["title"];
                $siteSlogan = $dados2["slogan"];
                $siteEmail = $dados2["email"];
                $siteLang = $dados2["language"];
            }
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
                            <td class="right_divider" style="font-size: 14pt; text-indent: 7px;" width="20.5%"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;DASHBORD</td>
                            <td class="right_divider" width="71%"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Welcome Back, <?php echo " <b>$name</b>!"?></td>
                            <td id="button_widget">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Widget</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Menu</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class="disabled"><a href="#">Coming Soon</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div> <!-- #header -->

                <div id="path">
                    <ol class="breadcrumb">
                        <li><span class="glyphicon glyphicon-home"></span></li>
                        <li><a href="#">Home</a></li>
                        <li class="active">Settings</li>
                    </ol>
                </div> <!-- path -->

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                    <i class="fa fa-cog"></i>&nbsp;Settings
                            </h4> <!-- /.panel-title -->
                        </div> <!-- /.panel-heading -->
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <form class="form-horizontal" style="font-size:12pt; color: #23282d" action="" method="POST">
                                  <div class="form-group">
                                    <label for="siteTitle" class="col-sm-2 control-label"><b>Site Title:</b></label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="siteTitle" name="txtSiteTitle" value="<?=$siteTitle?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="slogan" class="col-sm-2 control-label"><b>Slogan:</b></label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="slogan" name="txtSlogan" value="<?=$siteSlogan?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="AdminEmail" class="col-sm-2 control-label"><b>Admin Email:</b></label>
                                    <div class="col-sm-10">
                                      <input type="email" class="form-control" id="AdminEmail" name="txtAdminEmail" value="<?=$siteEmail?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="language" class="col-sm-2 control-label"><b>Site Language:</b></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="optLanguage" id="language">
                                            <option value="en">English</option>
                                            <option value="pt">Português</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="chkMaintenance" id="maintenance"> The site is down for maintenance!
                                        </label>
                                    </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                      <button type="submit" class="btn btn-success" name="btnSaveChanges">Save Changes</button>
                                    </div>
                                  </div>
                                </form>

                                <div id="author" class="col-md-4" style="margin-top:50px">
                                    André Santos, 2015/16.<br/>
                                    andrefilsantos@gmail.com
                                </div>
                                <div id="panelVersion" class="pull-right" style="margin-top:50px">
                                    Version <b>2.0</b>
                                </div>
                            </div> <!-- /.panel-body -->
                        </div> <!-- /#collapseOne -->
                    </div> <!-- /.panel -->
                </div> <!-- /.panel-group -->

            </section> <!-- /#dashboard -->
        </section> <!-- /#content -->
    </body>
</html>

<?php 
    if(isset($_POST["btnSaveChanges"])) {
        $titleIns  = $_POST["txtSiteTitle"];
        $sloganIns = $_POST["txtSlogan"];
        $emailIns  = $_POST["txtAdminEmail"];
        $langIns   = $_POST["optLanguage"];

        if($titleIns  != $siteTitle) $mysqli->query("UPDATE site SET title = '$titleIns' WHERE ID = 1");
        if($sloganIns != $siteSlogan) $mysqli->query("UPDATE site SET slogan = '$sloganIns' WHERE ID = 1");
        if($emailIns != $siteEmail) $mysqli->query("UPDATE site SET email = '$emailIns' WHERE ID = 1");
        if($langIns != $siteLang)  $mysqli->query("UPDATE site SET language = '$langIns' WHERE ID = 1");
    } 
?> 