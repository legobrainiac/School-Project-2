<ul id="accordion" class="accordion">
    <li>
        <a href="../index"><div class="link" title="Homepage"><img src="../images/stdBranco.png" style="widht: 17px; height: 17px; margin-left: -16px;" class="fa" /><label class="dsblb">STD Psiquiatria</label></div></a>
    </li>
    <li>
        <a href="index"><div class="link" title="+STD"><i class="fa fa-home"></i><label class="dsblb">Página Principal</label></div></a>
    </li>
    <li>
        <div class="link" title="Consultas"><i class="fa fa-heartbeat"></i><label class="dsblb">Consultas<i class="fa fa-chevron-down"></i></div>
        <ul class="submenu">
            <?php if($permissao == 1) { ?><li title="Todas as consultas"><a href="todasConsultas"><label class="dsblb">Todos as Consultas</a></li><?php } ?>
            <li title="Marcar Consulta"><a href="marcarConsulta"><label class="dsblb">Marcar consulta</a></li>
            <li title="Consultas Marcadas"><a href="consultasAgendadas"><label class="dsblb">Consultas Agendadas</a></li>
            <li title="Consultas Marcadas"><a href="historicoConsultas"><label class="dsblb">Histórico de Consultas</a></li>
        </ul>
    </li>
     <li>
        <div class="link" title="Mensagens"><i class="fa fa-commenting"></i>
        <label class="dsblb">Mensagens<i class="fa fa-chevron-down"></i></div>
        <ul class="submenu">
            <li title="Marcar Consulta"><a href="enviarMensagem"><label class="dsblb">Nova Mensagem</a></li>
            <li title="As minhas mensagens"><a href="mensagens"><label class="dsblb">As minhas mensagens</a></li>
            <li title="Mensagens Enviadas"><a href="mensagensEnviadas"><label class="dsblb">Mensagens Enviadas</a></li>
        </ul>
    </li>
    <?php if($permissao == 1) { ?>
        <li>
            <a href="media"><div class="link" title="Multimedia"><i class="fa fa-file-image-o"></i><label class="dsblb">Multimedia</div></a>
        </li>
        <li>
            <a href="contacts"><div class="link" title="Contact's"><i class="fa fa-comments"></i><label class="dsblb">Contactos</label></div></a>
        </li>
    <?php } ?>
    <li>
        <div class="link" title="Utilizadores"><i class="fa fa-users"></i><label class="dsblb">Utilizadores<i class="fa fa-chevron-down"></i></div>
        <ul class="submenu">
            <li><a href="allUsers" title="Todos os utilizadores"><label class="dsblb">Todos os utilizadores</a></li>
            <li><a href="addUser" title="Adicionar novo"><label class="dsblb">Novo Utilizador</a></li> 
        </ul>
    </li>
    <?php if($permissao == 1) { ?>
        <li>
            <a href="settings"><div class="link" title="Settings"><i class="fa fa-cog"></i><label class="dsblb"></label>Definções</div></a>
        </li>
    <?php } ?>
</ul>