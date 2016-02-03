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
        <title> Add New User > Control Panel > Ahriru Productions </title>
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
                        <li class="active">Add Category</li>
                    </ol>
                </div> <!-- path -->

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <i class="fa fa-bookmark-o"></i>&nbsp;Add Category
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="col-md-8">
                                    <table class="table table-striped col-md-8"> 
                                        <thead> 
                                            <tr> 
                                                <th>#</th> 
                                                <th>Name</th>
                                                <th>Description</th> 
                                                <th>Post's</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $select = $mysqli->query("SELECT * FROM categories ORDER BY ID ASC");
                                                $row = $select->num_rows;
                                                if($row > 0) {
                                                    while($get = $select->fetch_array()) {
                                            ?>
                                                        <tr> 
                                                            <td><?=$get["ID"]?></td>
                                                            <td><?=$get["name"]?></td>
                                                            <td><?=$get["description"]?></td>
                                                            </td>
                                                        </tr>
                                            <?php
                                                    }
                                                } else {
                                            ?>
                                                <h4> No Category found :'( <br/></h4>
                                                <div>
                                                    <a href="#">Add one.</a>
                                                </div>
                                            <?php
                                                }
                                            ?>
                                        </tbody> 
                                    </table>
                                </div>
                                <div class="panel-group col-lg-4" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                Add Category
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3" class="pull-right"><span class="glyphicon glyphicon-chevron-up" id="minimize-panel"></span></a>
                                            </h4> <!-- /.panel-title -->
                                        </div> <!-- /.panel-heading -->
                                        <div id="collapseOne3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" style="color: #212121">
                                            <div class="panel-body" style="font-size: 12pt">
                                                    <form action="" method="POST">
                                                        <div class="form-horizontal col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" name="txtName" class="form-control" placeholder="Title" name="txtTitle">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea name="txtDesciption" class="form-control" placeholder="Description" name="txtDescription"></textarea>
                                                            </div>
                                                            <div class="form-group pull-right">
                                                                <input type="submit" class="btn btn-primary" value="Add!" name="btnAdd"> 
                                                            </div>
                                                            <!--<div class="input-group">
                                                                <input type="text" class="form-control" placeholder="e.g: C#" name="txtCategory">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-primary" type="submit" name="btnAdd">Add!</button>
                                                                </span>
                                                            </div><!-- /input-group -->
                                                        </div>
                                                    </form>
                                            </div> <!-- /.panel-body -->
                                        </div> <!-- /#collapseOne3 -->
                                    </div> <!-- /.panel -->
                                </div><!-- /.panel-group -->
                            </div> <!-- .panel-body -->
                        </div> <!-- #collapseOne -->
                    </div> <!-- /.panel -->
                </div> <!-- /.panel-group -->

            </section> <!-- /#dashboard -->
        </section> <!-- /#content -->
    </body>
</html>

<?php 
    if(isset($_POST["btnAdd"])) {
        $name        = $_POST["txtName"];
        $description = $_POST["txtDescription"];
        $mysqli->query("INSERT INTO categories (name, description) VALUES ('$name', '$description')");
    } 
?>