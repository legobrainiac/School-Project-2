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
                              Bem-Vindo ao novo portal +STD!<br/>
		                    </div>
                    <?php } ?>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-heartbeat"></i>&nbsp;Consultas Agendadas</h3>
                          </div> <!-- /panel-heading -->
                          <div class="panel-body">
                            <table class="table table-striped"> 
                                    <thead> 
                                        <tr> 
                                            <th>Clinica</th> 
                                            <th>Especialidade</th>
                                            <?php
                                                if($permissao == 2)
                                                    echo "<th>Utente</th>";
                                                else
                                                    echo "<th>Médico</th>";
                                            ?>
                                            <th>Data e Hora</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($permissao == 2) //medico
                                                $select = $mysqli->query("SELECT * FROM consultas WHERE medico = '$nome'");
                                            else
                                                $select = $mysqli->query("SELECT * FROM consultas WHERE nome = '$nome'");
                                            $row = $select->num_rows;
                                            if($row > 0) {
                                                while($get = $select->fetch_array()) {
                                                  if(!verificar_data($get["data"])){
                                        ?>
                                                    <tr> 
                                                        <td><?=$get["clinica"]?></td>
                                                        <td><?=$get["especialidade"]?></td>
                                                        
                                                        <?php 
                                                            if($permissao == 2) //medico
                                                                echo "<td>".$get['nome']."</td>";
                                                            else
                                                                echo "<td>".$get['medico']."</td>";
                                                        ?>
                                                        <td><?=$get["data"]." às ".$get["hora"][0].$get["hora"][1].$get["hora"][2].$get["hora"][3].$get["hora"][4]?></td>
                                                    </tr>
                                        <?php
                                                  }
                                                }
                                            } else {
                                        ?>
                                            <h4> Nenhuma Consulta.. <br/></h4>
                                        <?php
                                            }
                                        ?>
                                    </tbody> 
                                </table>
                          </div> <!-- /.panel-body -->
                        </div> <!-- /.panel -->
                    </div>

                    <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">As minhas mensagens</h3>
                          </div> <!-- /panel-heading -->
                          <div class="panel-body">
                            <table class="table table-striped"> 
                                    <thead> 
                                        <tr> 
                                            <th>De</th> 
                                            <th>Mensagem</th>
                                            <th>Data</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $select = $mysqli->query("SELECT * FROM mensagens WHERE recetor = '$username'");
                                            $row = $select->num_rows;
                                            if($row > 0) {
                                                while($get = $select->fetch_array()) {
                                        ?>
                                                    <tr> 
                                                        <td><?=$get["emissor"]?></td>
                                                        <td><?=$get["mensagem"]?></td>
                                                        <td><?=$get["data"]?></td>
                                                    </tr>
                                        <?php
                                                }
                                            } else {
                                        ?>
                                            <h4> Nenhuma mensagem... <br/></h4>
                                        <?php
                                            }
                                        ?>
                                    </tbody> 
                                </table>
                          </div> <!-- /.panel-body -->
                        </div> <!-- /.panel -->
                    </div>

                    <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-body" style="color: #000">
                            A <b>STD Psiquiatria</b> disponibiliza agora um novo canal através do qual pode efetuar a marcação da sua consulta, consultar os atos médicos agendados ou remarcar uma consulta.<br/><br/>
                            A pensar em si e no seu bem-estar, disponibilizamos uma solução acessível e eficaz, garantindo com segurança uma total confidencialidade.<br /><br/>
                            <b>STD</b> é uma marca que abrange clínicas de norte a sul do país. O seu principal foco é cuidar dos seus clientes.<br/><br/>
                            Mais do que uma clinica, o <b>grupo STD</b> é uma casa que recebe os seus clientes, que partilha as suas preocupações e que os apoia sempre da melhor forma.
                            Estamos ao seu lado quando mais precisam: quer através do atendimento dos nossos médicos especialistas em várias áreas da saúde, passando pelo acompanhamento telefónico, pelos melhores equipamentos tecnológicos ou até pelos serviços online que gerem as suas consultas, marcações, exames e muitos mais.<br/><br/>
                            <b>Nas clinicas STD ou em qualquer uma das suas Clínicas encontram-se pessoas genuínas que têm uma única preocupação: cuidar.​</b>
                          </div> <!-- /.panel-body -->
                        </div> <!-- /.panel -->
                    </div>

                    <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Eventos</h3>
                          </div> <!-- /panel-heading -->
                          <div class="panel-body">
                            Nesta área damos-lhe a conhecer os eventos organizados pelas Unidades da STD Psiquiatria. Contamos com a sua participação!<br/><br/>
                            <div class="alert alert-warning">Não existem eventos agendados.</div>
                          </div> <!-- /.panel-body -->
                        </div> <!-- /.panel -->
                    </div>

                    <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Inquéritos</h3>
                          </div> <!-- /panel-heading -->
                          <div class="panel-body">
                            Ajude-nos a conhecer o que mais valoriza e contribua para temas relevantes na área da saúde. Agradecemos o seu contributo.<br/><br/>
                            <div class="alert alert-warning">Não existem inquéritos ativos.</div>
                          </div> <!-- /.panel-body -->
                        </div> <!-- /.panel -->
                    </div>
            </section>
        </section>
	</body>
</html>