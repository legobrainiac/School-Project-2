<span id="logo">
    <a href="index.php"><img src="../images/+std_logo.png" width="110px"></a>
</span>
<span id="cp">Painel de Controlo</span>
<span id="right">
    <span id="p1" style="text-align: right">
    <?php 
        $diaSemana = date('l');
        $mes = date("F");
        if($diaSemana == "Monday")
            $diaSemana = "Segunda-Feira";
        elseif($diaSemana == "Tuesday")
            $diaSemana = "Terça-Feira";
        elseif($diaSemana == "Wednesday")
            $diaSemana = "Quarta-Feira";
        elseif($diaSemana == "Thursday")
            $diaSemana = "Quinta-Feira";
        elseif($diaSemana == "Friday")
            $diaSemana = "Sexta-Feira";
        elseif($diaSemana == "Saturday")
            $diaSemana = "Sábado";
        elseif($diaSemana == "Sunday")
            $diaSemana = "Domingo";

        if($mes == "January")
            $mes = "Janeiro";
        elseif($mes == "February")
            $mes = "Fevereiro";
        elseif($mes == "March")
            $mes = "Março";
        elseif($mes == "May")
            $mes = "Maio";
        elseif($mes == "May")
            $mes = "Maio";
        elseif($mes == "May")
            $mes = "Maio";
        elseif($mes == "June")
            $mes = "Junho";
        elseif($mes == "July")
            $mes = "Julho";
        elseif($mes == "August")
            $mes = "Agosto";
        elseif($mes == "September")
            $mes = "Setembro";
        elseif($mes == "October")
            $mes = "Outubro";
        elseif($mes == "November")
            $mes = "Novembro";
        elseif($mes == "December")
            $mes = "Dezembro";
    ?>
    <span id="date"><b><?php echo "$diaSemana, " . date("d") . " de " . "$mes de " . date(" Y ") ?></b></span><br />
    <span id="hour"></span>
    </span>
    <script type="text/javascript">
        renderTime();
    </script>

    <img src="../images/division.png">
    <span id="p2">
        <span id="image_user"><img id="image_user" class="teste" src="../images/<?php echo $username ?>.jpg"></span>
        <span class="dropdown">
            <span id="user" class="dropdown-tooggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Olá,<?php echo " <b>$nome</b>"?> <span class="caret"></span></span>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="edit_profile.php?id=<?php echo $id ?>"><span class="glyphicon glyphicon-user"></span>&nbsp;O meu perfil</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="?func=sairPagina"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Terminar Sessão</a></li>
          </ul>
        </span>
        <span id="open_menu">
            <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
        </span>
</span>
