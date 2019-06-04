<?php
	
	include("autenticacao.php");
	include("classeForm.php");
	include("conexao.php");

	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=facilidade";
	$parametros["method"] = "post";
	
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "id_facilidade";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "ID da facilidade";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "nome_facilidade";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Nome da facilidade";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "descricao";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Descrição da facilidade";	
	$f->add_input($parametros);	

	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	
	$f->exibe();
	
?>
