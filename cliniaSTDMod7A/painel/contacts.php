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
        <title> Contactos > +STD > STD Psiquitria </title>
        <?=$headerContentPainel?>
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
                            <td onclick="csgag()" class="right_divider" style="font-size: 14pt; text-indent: 7px;" width="20.5%"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;DASHBORD</td>
                            <td class="right_divider" width="71%"><span class="glyphicon glyphicon-info-sign"></span> Welcome Back, <?php echo " <b>$name</b>! Your last sig in at $last_sign"?></td>
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
                        <li class="active">Contact's</li>
                    </ol>
                </div> <!-- path -->

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                    <i class="fa fa-comments"></i>&nbsp;Contact's
                            </h4> <!-- /.panel-title -->
                        </div> <!-- /.panel-heading -->
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body table-responsive" style="color:#000">
                                <table class="table table-striped"> 
                                    <thead> 
                                        <tr> 
                                            <th>#</th> 
                                            <th>Name</th>
                                            <th>Email</th> 
                                            <th>Subject</th> 
                                            <th>Message</th>
                                            <th>Date</th> 
                                            <th>Want us to call?</th> 
                                            <th>Contacted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 0;
                                            $select = $mysqli->query("SELECT * FROM contact ORDER BY ID ASC");
                                            $row = $select->num_rows;
                                            if($row > 0) {
                                                while($get = $select->fetch_array()) {
                                        ?>
                                                    <tr <?php if($get["wantContacted"] == 1 && $get["contacted"] == 0) echo "class='danger'"; elseif ($get["wantContacted"] == 1 && $get["contacted"] == 1) echo "class='success'"; elseif($get["contacted"] == 1) echo "class='info'";?>> 
                                                        <th scope="row"><?=$get["ID"]?></th>
                                                        <td><?=$get["name"]?></td>
                                                        <td><?=$get["email"]?></td>
                                                        <td><?=$get["subject"]?></td>
                                                        <td><?=$get["message"]?></td>
                                                        <td><?=$get["date"]?></td>
                                                        <td><?php if($get["wantContacted"] == 0) echo "No"; else echo "Yes";?></td>
                                                        <td><?php if($get["contacted"] == 0) echo "No"; else echo "Yes";?></td>
                                                        <!--<td><a href="" title="Edit this profile"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a href="" title="Delete this user"><i class="fa fa-user-times"></i></a></td>-->
                                                    </tr>
                                        <?php
                                                }
                                            } else {
                                        ?>
                                            <h4> There is no message.. <br/></h4>
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