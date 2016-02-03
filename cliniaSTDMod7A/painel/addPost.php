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
        <title> Add New Post > Control Panel > Ahriru Productions </title>
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
        <script type="text/javascript">
            function txarlen() {
                var textareaContent = document.getElementById('txtBodyPst').value;
                var words = textareaContent.split(' ');
                var nWords = words.length;
                if(textareaContent == " " || textareaContent == "")
                    nWords = 0;
                $('#textareaLens').html("Words: <b>" + nWords + "</b> Chars: <b>" + textareaContent.length + "</b>");
            }
        </script>

        <style type="text/css">
            iframe {
                width: 500px;
                padding: 10px;
                border: 1px #dddddd solid;
                margin-top: -43px;
                border-top:none;
                border-bottom-left-radius: 5px;
                border-bottom-right-radius: 5px;
            }

            div#buttons {
                background-color: #f7f7f9;
                border: 1px #dddddd solid;  
                width: 100%;
                padding: 10px;
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
            }
        </style>
    </head>

    <body id="addPost" onload="loadIframe()">
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
                        <li><a href="#">User's</a></li>
                        <li class="active">All User's</li>
                    </ol>
                </div> <!-- path -->

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                    <i class="fa fa-plus"></i>&nbsp;Add Post
                            </h4> <!-- /.panel-title -->
                        </div> <!-- /.panel-heading -->
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <form method="POST" action="" enctype="multipart/form-data" id="FrmaddPost">
                                    <div class="form-horizontal">
                                        <div class="form-group">
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
                                                <input class="form-control" placeholder="Title" type="text" name="txtTitle" id="txtTitle">
                                            </div> <!-- /.col-lg-8 -->
                                        </div> <!-- /.form-group -->

                                        <?php
                                            echo "Permalink: http://www.ahiruproductions.com/article.php?id=<br/><br/>";
                                        ?>
                                        <button class="btn btn-default"><i class="fa fa-file-image-o"></i>&nbsp;Add Media</button><br/><br/>

                                        <div class="form-group">
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

                                                <!-- TEXTAREA TRUE
                                                <textarea class="form-control" placeholder="Title" name="txtBodyPst" id="txtBodyPst" rows="20" oninput="txarlen()"></textarea>
                                                -->
                                                <div id="buttons">
                                                    <input class="btn btn-default" type="button" onclick="formatText('b')" value="B" style="font-weight: bold;">
                                                    <input class="btn btn-default" type="button" onclick="formatText('i')" value="I" style="font-style: italic;">
                                                    <input class="btn btn-default" type="button" onclick="formatText('u')" value="U" style="text-decoration: underline;">
                                                    <input class="btn btn-default" type="button" onclick="formatText('s')" value="Size">
                                                    <input class="btn btn-default" type="button" onclick="formatText('c')" value="Color">
                                                    <input type="color" >
                                                    <input class="btn btn-default" type="button" onclick="formatText('hr')" value="HR">
                                                    <input class="btn btn-default" type="button" onclick="formatText('ul')" value="UL">
                                                    <input class="btn btn-default" type="button" onclick="formatText('ol')" value="OL">
                                                    <input class="btn btn-default" type="button" onclick="formatText('link')" value="Link">
                                                    <input class="btn btn-default" type="button" onclick="formatText('unlink')" value="UnLink">
                                                    <input class="btn btn-default" type="button" onclick="formatText('image')" value="Image">
                                                </div>
                                                <br/><br/>
                                                <textarea class="form-control" name="txtMessage" id="comment" cols="60" rows="10" style="display: none;" id="txtMessage"></textarea>
                                                <iframe name="frm" id="frm" style="font-size: 12pt; width: 100%; height: 500px;" oninput="txarlen()"></iframe>
                                                <!--<br /><br /><input type="submit" onclick="Submit()" value="Submit" name="submit">
                                                <!--<div id="textareaLens">Words: <b>0</b> Chars: <b>0</b></div>-->
                                            </div> <!-- /.col-lg-8 -->
                                            <div class="panel-group col-lg-4" id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            Publish 
                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2" class="pull-right"><span class="glyphicon glyphicon-chevron-up" id="image"></span></a>
                                                        </h4> <!-- /.panel-title -->
                                                    </div> <!-- /.panel-heading -->
                                                    <div id="collapseOne2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" style="color: #212121">
                                                        <div class="panel-body" style="font-size: 12pt">
                                                            <div id="publishOptions">
                                                                <p><i class="fa fa-bars"></i>&nbsp;&nbsp;Status: <b></b><a href="#">Edit</a></p>
                                                                <p><i class="fa fa-eye"></i>&nbsp;&nbsp;Visibility: <b></b><a href="#">Edit</a></p>
                                                                <p><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;Published on: <b></b><a href="#">Edit</a></p>
                                                            </div> <!-- /#publishOptions -->
                                                            <hr class="featurette-divider">
                                                            <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;Move to Trash</button>
                                                            <input type="submit" onclick="Submit()" name="submit" class="pull-right btn btn-success" value="Publish">
                                                        </div> <!-- /.panel-body -->
                                                    </div> <!-- /#collapseOne2 -->
                                                </div> <!-- /.panel -->
                                            </div><!-- /.panel-group -->

                                            <div class="panel-group col-lg-4" id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            Format 
                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3" class="pull-right"><span class="glyphicon glyphicon-chevron-up" id="image"></span></a>
                                                        </h4> <!-- /.panel-title -->
                                                    </div> <!-- /.panel-heading -->
                                                    <div id="collapseOne3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" style="color: #212121">
                                                        <div class="panel-body" style="font-size: 12pt">
                                                            <div class="radio">
                                                              <label>
                                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                                                <i class="fa fa-file"></i>&nbsp;&nbsp;Standard
                                                              </label>
                                                            </div> <!-- /.radio -->

                                                            <div class="radio">
                                                              <label>
                                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option2">
                                                                <span class="glyphicon glyphicon-facetime-video"></span>&nbsp;&nbsp;Tutorial
                                                              </label>
                                                            </div> <!-- /.radio -->

                                                            <div class="radio">
                                                              <label>
                                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                                                                <span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;Project
                                                              </label>
                                                            </div> <!-- /.radio -->
                                                        </div> <!-- /.panel-body -->
                                                    </div> <!-- /#collapseOne3 -->
                                                </div> <!-- /.panel -->
                                            </div><!-- /.panel-group -->
                                        </div> <!-- /.form-group -->

                                        <div class="panel-group col-lg-4" id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-bookmark-o"></i>&nbsp;Categories
                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne4" aria-expanded="true" aria-controls="collapseOne4" class="pull-right"><span class="glyphicon glyphicon-chevron-up" id="image"></span></a>
                                                        </h4> <!-- /.panel-title -->
                                                    </div> <!-- /.panel-heading -->
                                                    <div id="collapseOne4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" style="color: #212121">
                                                        <div class="panel-body" style="font-size: 12pt">
                                                            <?php 
                                                                $categories = $mysqli->query("SELECT * FROM categories");
                                                                $rows_categories = $categories->num_rows;
                                                                if($rows_categories > 0) {
                                                                    while($allCategories = $categories->fetch_array()) {
                                                            ?>
                                                                        <div class="checkbox">
                                                                            <label>
                                                                              <input type="checkbox"> <?=$allCategories['name']?>
                                                                            </label>
                                                                        </div>
                                                            <?php
                                                                    }
                                                                } 
                                                            ?>
                                                        </div> <!-- /.panel-body -->
                                                    </div> <!-- /#collapseOne2 -->
                                                </div> <!-- /.panel -->
                                            </div><!-- /.panel-group -->

                                        <div class="form-group">
                                            <label class="col-md-1 control-label">Author:</label>
                                            <div class="col-md-2">
                                                <select class="form-control" value="Autor">
                                                    <?php
                                            $i = 0;
                                            $select = $mysqli->query("SELECT * FROM users ORDER BY ID ASC");
                                            $row = $select->num_rows;
                                            if($row > 0) {
                                                while($get = $select->fetch_array()) {
                                            ?>
                                                <option><?=$get["name"]?></option>
                                            <?php
                                                }
                                            }
                                                ?>
                                                </select>
                                            </div> <!-- .col-lg-8 -->
                                        </div>  <!-- .form-group -->
                            </div> <!-- /.panel-body -->
                        </div> <!-- /#collapseOne -->
                    </div> <!-- /.panel -->
                </div> <!-- /.panel-group -->

            </section> <!-- /#dashboard -->
        </section> <!-- /#content -->
    </body>
</html>