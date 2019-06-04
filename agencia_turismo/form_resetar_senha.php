<?php

    include("classeCabecalho.php");
	$c->exibe_menu();

    include("classeForm.php");
	
	$parametros = null;
    $parametros["action"] = "enviar_resetar_senha.php";
	$parametros["method"] = "POST";
	
    $f = new Form($parametros);

    $parametros = null;
	$parametros["name"] = "email";
    $parametros["type"] = "email";
    $parametros["class"] = "form-control";
    $parametros["required"] = "required";
	$parametros["placeholder"] = "Informe seu email";	
    $f->add_input($parametros);
    
    $f->exibe();

?>