<?php 
    include('connection.php');
    include('util.php');
    error_reporting(false);
?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <title>Contact > <?=$siteTitle . " | " . $siteSlogan?></title>
    <?=$headerContent?>
    <script type="text/javascript">
        $(function(){
            var menu_home = $('.home');
            var menu_contact = $('.contact');
            menu_home.removeClass("active");
            menu_contact.addClass("active");
        });
    </script>
  </head>

  <body id="about">
    <header id="header">
        <?php include("header.php") ?>
    </header>
    <section class="body_container">
        <div id="title">
            <span id="title_page">Contactos</span>
        </div>
        <div id="contactosR" style="margin-bottom: 350px">
            <div class="col-md-9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1513.3023365480979!2d-7.907811394376429!3d40.66064401248546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd23364efce139bb%3A0xe456f253870748dd!2sEscola+Secund%C3%A1ria+de+Em%C3%ADdio+Navarro+-+Viseu!5e0!3m2!1spt-PT!2spt!4v1454262596957" width="100%" height="300px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-3">
                <h4>Contactos:</h4><br />
                <b>Telefone</b> | <?=$siteTelefone?><br />
                <b>Email  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> | <?=$siteEmail?><br />
            </div>
        </div>
        <div class="tab-content">
            <div>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Form</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">E-mail's</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <br />
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="frmContactTxtName">Nome</label>
                            <input type="text" name="txtName" class="form-control" id="frmContactTxtName" placeholder="Nome" required>
                        </div>
                        <div class="form-group">
                            <label for="frmContactTxtEmail">E-mail</label>
                            <input type="email" name="txtEmail" class="form-control" id="frmContactTxtEmail" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="frmContactTxtSubject">Assuto</label>
                            <input type="text" name="txtSubject" class="form-control" id="frmContactTxtSubject" placeholder="Assunto">
                        </div>
                        <div class="form-group">
                            <label for="frmContactTxtMessage" class="control-label">Messagem</label>
                            <textarea name="txtMessage" class="form-control" id="frmContactTxtMessage" rows="7" placeholder="Mensagem..." style="resize: none;" required></textarea>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="chkContact" value="true"> Quero ser contactado...
                            </label>
                        </div>
                        <input type="submit" name="btnSubmit" class="btn btn-default" value="Enviar >">
                    </form>
                    <br />
                </div> <!-- /.tab-content -->
                <div role="tabpanel" class="tab-pane" id="profile">
                    <br />
                    <table class="table">
                        <?php
                            $select = $mysqli->query("SELECT * FROM users WHERE permissoes = 1 AND username != 'admin' ORDER BY ID ASC");
                            $row = $select->num_rows;
                            if($row > 0) {
                                while($get = $select->fetch_array()) {
                        ?>
                                    <tr> 
                                        <td style="vertical-align: middle; width: 50px; padding-right: 0px;"><img src="images/<?=$get["username"]?>.jpg" style="width: 50px;" class="img-circle img-responsive"></td>
                                        <td style="vertical-align: middle; width: 50px; padding-right: 0px;"><?=$get["name"]?></td>
                                        <td style="vertical-align: middle; width: 50px; padding-right: 0px;"><?=$get["email"]?></td>
                                    </tr>
                      <?php
                                }
                            }
                        ?>
                    </table>
                </div>
              </div>

            </div>
    </section>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

<?php 
    if(isset($_POST["btnSubmit"])) {
        $name          = $_POST["txtName"];
        $email         = $_POST["txtEmail"];
        $subject       = $_POST["txtSubject"];
        $message       = $_POST["txtMessage"];
        $wantContacted = $_POST["chkContact"];
        $date          = date('Y/m/d');

        if(!$wantContacted) $wantContacted = 'false';
        if($wantContacted == 'true') {$wantContacted = true;} elseif($wantContacted == 'false') {$wantContacted = false;}

        $query = $mysqli->query("INSERT INTO contact (name, email, subject, message, date, wantContacted, contacted) VALUES ('$name', '$email', '$subject', '$message', '$date', '$wantContacted', false)");

        if($query)
            echo "<script> alert('Message sent successfully!');</script>";
        else
            echo "<script> alert('Error sending message. \n Please try again later.'); </script>";
    }
?>