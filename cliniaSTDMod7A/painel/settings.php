<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    $error = false;
    include("../util.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Definições > +STD > STD Psiquitria </title>
        <?=$headerContentPainel?>
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
                                    <i class="fa fa-cog"></i>&nbsp;Definições
                            </h4> <!-- /.panel-title -->
                        </div> <!-- /.panel-heading -->
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <form class="form-horizontal" style="font-size:12pt; color: #23282d" action="" method="POST">
                                  <div class="form-group">
                                    <label for="siteTitle" class="col-sm-2 control-label"><b>Titulo do Site:</b></label>
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
                                    <label for="AdminEmail" class="col-sm-2 control-label"><b>Email Administração:</b></label>
                                    <div class="col-sm-10">
                                      <input type="email" class="form-control" id="AdminEmail" name="txtAdminEmail" value="<?=$siteEmail?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="chkMaintenance" id="maintenance"> Site em manutenção
                                        </label>
                                    </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                      <button type="submit" class="btn btn-success" name="btnSaveChanges">Guardar Alterações</button>
                                    </div>
                                  </div>
                                </form>
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