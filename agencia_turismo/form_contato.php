<?php


	include("classeCabecalho.php");
	$c->exibe_menu();

    include("classeForm.php");
	include("autenticacao.php");	
	
	$parametros = null;
	$parametros["action"] = "envia_mensagem.php";
	$parametros["method"] = "POST";
	
    $f = new Form($parametros);

    $parametros = null;
	$parametros["name"] = "assunto";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite o assunto";	
    $f->add_input($parametros);

    $parametros = null;
	$parametros["name"] = "mensagem";
	$parametros["placeholder"] = "Digite a mensagem";	
    $f->add_textarea($parametros);

    //$parametros = null;
	//$parametros["name"] = "senha_duvida";
	//$parametros["type"] = "password";
	//$parametros["placeholder"] = "Senha do e-mail do Google";	
    //$f->add_input($parametros);
    
    $f->exibe();

?>