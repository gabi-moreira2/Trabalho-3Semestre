<?php

    include("classeCabecalho.php");
    $c->exibe_menu();
    include("autenticacao.php");
    $from = $_SESSION["cliente"]->get_email(); //"gabiiluisamoreira@gmail.com";
    $fromName = $_SESSION["cliente"]->get_nome();
    $subject = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];
    include("email.php");
    
?>