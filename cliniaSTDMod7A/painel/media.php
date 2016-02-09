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
        <title> Ficheiro Media > +STD > STD Psiquitria </title>
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
        <script type="text/javascript">
            function copyToClipboard(element) {
                alert(element);
                var $temp = $("<input>")
                $("body").append($temp);
                $temp.val($(element).text()).select();
                document.execCommand("copy");
                $temp.remove();
            }
        </script>
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
                            <td class="right_divider" width="71%"><span class="glyphicon glyphicon-info-sign"></span> Welcome Back, <?php echo " <b>$name</b>!"?></td>
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
                        <li class="active">Media</li>
                    </ol>
                </div> <!-- path -->
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                    Media
                            </h4> <!-- /.panel-title -->
                        </div> <!-- /.panel-heading -->
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <?php 
                                    $i = 0;
                                    $files = scandir('../images/');
                                    foreach($files as $file) {
                                        $imageName = substr($file, 0, strrpos($file, '.'));
                                        $imageExt  = substr($file, strrpos($file, '.') + 1, strlen($file));
                                        $sizess = getimagesize($file);
                                        $url = $_SERVER['HTTP_REFERER'];
                                        if($i>1)
                                            echo "<img src='../images/$file' class='img-thumbnail' style='height: 150px; width: 150px; margin: 5px' data-toggle='modal' data-target='#myModal$i'>";
                                            echo "
                                                <div class='modal fade' id='myModal"."$i' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' style='margin-top: 150px;'>
                                                    <div class='modal-dialog' role='document'>
                                                        <div class='modal-content'>
                                                          <div class='modal-header'>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                                                <h4 class='modal-title' id='myModalLabel'>Image Details: $imageName</h4>
                                                              </div>
                                                              <div class='modal-body'>
                                                                <div id='imageDetailsImg' style='background-color: #ddd; text-align: center'> 
                                                                    <img src='../images/$file' style='max-height: 150px; padding: 20px'>
                                                                </div>

                                                                <br/><br/><b>Nome do ficheiro:</b> $file  <br />
                                                                <b>Ficheiro do tipo:</b> image/$imageExt <br />
                                                                <b>URL:</b> $url
                                                              </div>
                                                              <div class='modal-footer'>
                                                              <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                           </div>
                                                        </div>
                                                      </div>
                                                </div>
                                            ";

                                         $i++;  
                                    }
                                ?>
                            </div> <!-- /.panel-body -->
                        </div> <!-- /#collapseOne -->
                    </div> <!-- /.panel -->
                </div> <!-- /.panel-group -->

            </section> <!-- /#dashboard -->
        </section> <!-- /#content -->
    </body>
</html>

