<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("sairPagina.php");
    sairPagina();
    include("../util.php");
    $nomePagina = "Ficheiros Multimedia";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php echo "$nomePagina > +STD > $siteTitle"; ?></title>
        <?php 
            echo $headerContentPainel;
            $username = $_SESSION["user"];
        ?>
        <style type="text/css">
            img.img-thumbnail:hover {
                cursor: pointer;
            }
        </style>
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
                            <td class="right_divider" style="font-size: 14pt; text-indent: 7px;" width="20.5%"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Painel de Controlo</td>
                            <td class="right_divider" width="71%"><span class="glyphicon glyphicon-info-sign"></span> Bem-vindo de volta, <?php echo " <b>$nome</b>!"?></td>
                        </tr>
                    </table>
                </div> <!-- #header -->

                <div id="path">
                    <ol class="breadcrumb">
                        <li><span class="glyphicon glyphicon-home"></span></li>
                        <li><a href="#">Home</a></li>
                        <li class="active">Multimedia</li>
                    </ol>
                </div> <!-- path -->

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                Multimedia
                            </h4> <!-- /.panel-title -->
                        </div> <!-- /.panel-heading -->
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <?php 
                                    $dir    = '../images/';
                                    $files1 = scandir('../images/');
                                    $i = 0;
                                    foreach ($files1 as $item) {
                                        $url       = $_SERVER['HTTP_REFERER'];
                                        $imageName = substr($item, 0, strrpos($item, '.'));
                                        $imageExt  = substr($item, strrpos($item, '.') + 1, strlen($item));
                                        $size      = getimagesize('../images/'.$item);
                                        $url       = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                        $pos       = strpos($url, "painel");
                                        $urlA      = substr($url, $pos);
                                        $url       = str_replace(substr($url, strpos($url, "painel")), "", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"). "images/" . $item;
                                        $imgSize = $size[0] . "x" . $size[1];
                                        if($size != "") {
                                            echo "<img src='../images/$item' class='img-thumbnail' style='height: 150px; width: 150px; margin: 5px' data-toggle='modal' data-target='#myModal$i'>";
                                            echo "
                                                <div class='modal fade' id='myModal"."$i' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' style='margin-top: 150px'>
                                                    <div class='modal-dialog' role='document' style='width: 70%'>
                                                        <div class='modal-content'>
                                                          <div class='modal-header'>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                                                <h4 class='modal-title' id='myModalLabel'>Detalhes da Imagem: $imageName</h4>
                                                              </div>
                                                              <div class='modal-body'>
                                                                <div id='imageDetailsImg' style='background-color: #ddd; text-align: center'> 
                                                                    <img src='../images/$item' style='max-width: 350px; padding: 20px'>
                                                                </div>
                                                                <br/><br/><b>Nome do ficheiro:</b> $item  <br />
                                                                <b>Ficheiro do tipo:</b> image/$imageExt <br />
                                                                <b>Tamanho da imagem:</b>$imgSize<br/>
                                                                <b>URL:</b> $url
                                                              </div>
                                                              <div class='modal-footer'>
                                                              <button type='button' class='btn btn-danger' data-dismiss='modal'>Fechar</button>
                                                           </div>
                                                        </div>
                                                      </div>
                                                </div>
                                            ";
                                        }
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