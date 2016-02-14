<?php
	include("../connection.php");
	session_start();
	include("protegerPagina.php");
	protegerPagina();
    include("sairPagina.php");
    sairPagina();
    include("../util.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title> +STD > STD Psiquitria </title>
        <?=$headerContentPainel?>
        <?php
            $username = $_SESSION["user"];
            $this_sign = date('d/m/Y'). " às ". (date('H') == 00 ? '23' : date('H')-1). date(':i');
            $last_s = $mysqli->query("UPDATE users SET last_sign = '$this_sign' WHERE username = '$username';");
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
                            <td class="right_divider" style="font-size: 14pt; text-indent: 7px;" width="20.5%"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Painel de Controlo</td>
                            <td class="right_divider" width="71%"><span class="glyphicon glyphicon-info-sign"></span> Bem-Vindo de volta, <?php echo " <b>$nome</b>! A última vez que iniciou sessão foi no dia $last_sign"?></td>
                        </tr>
                    </table>
                </div>
                <div id="path">
                    <ol class="breadcrumb">
                        <li><span class="glyphicon glyphicon-home"></span></li>
                        <li><a href="#">Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
                	<?php 
                		if(empty($last_sign)) {
                	?>
		                    <div class="alert alert-success alert-dismissible fade in" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              Bem-Vindo ao portal +STD!<br/>
                              Temos imensas funcionalidades à sua espera, que simplificaram a sua vida.
		                    </div>
                    <?php } ?>

                    <div class="col-md-6">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">As minhas consultas</h3>
                          </div> <!-- /panel-heading -->
                          <div class="panel-body">
                            Panel Body
                          </div> <!-- /.panel-body -->
                        </div> <!-- /.panel -->
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">As minhas mensagens</h3>
                          </div> <!-- /panel-heading -->
                          <div class="panel-body">
                            Panel Body
                          </div> <!-- /.panel-body -->
                        </div> <!-- /.panel -->
                    </div>
            </section>
        </section>
	</body>
</html>