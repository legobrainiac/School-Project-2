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
        <title> Page Title > Control Panel > Ahriru Productions </title>
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

    <body id="allPosts">
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
                        <li><a href="#">Post's</a></li>
                        <li class="active">All Post's</li>
                    </ol>
                </div> <!-- path -->

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                    <i class="fa fa-sticky-note"></i>&nbsp;All Post's
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
                                            <th>City</th> 
                                            <th>Information</th> 
                                            <th>Permission</th>
                                            <th>Joined</th> 
                                            <th>Ratings</th> 
                                            <th>Options</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 0;
                                            $select = $mysqli->query("SELECT * FROM posts ORDER BY ID ASC");
                                            $row = $select->num_rows;
                                            if($row > 0) {
                                                while($get = $select->fetch_array()) {
                                        ?>
                                                    <tr> 
                                                        <th scope="row"><?=$get["ID"]?></th>
                                                        <td><img src="../images/<?=$get["username"]?>.jpg" style="width: 50px;" class="img-circle img-responsive"></td>
                                                        <td><?=$get["username"]?></td>
                                                        <td><?=$get["name"]?></td>
                                                        <td><?=$get["email"]?></td>
                                                        <td><?=$get["city"]?></td>
                                                        <td><?=$get["information"]?></td>
                                                        <td><?=$get["permission"]?></td>
                                                        <td><?=$get["joined"]?></td>
                                                        <td><?=$get["ratings"]?></td>
                                                        <td><a href="" title="Edit this profile"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a href="" title="Delete this user"><i class="fa fa-user-times"></i></a></td>
                                                    </tr>
                                        <?php
                                                }
                                            } else {
                                        ?>
                                            <h4> Not entered any post ... <br/></h4>
                                            <div>
                                                <a href="addPost.php">Insert one!</a>
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