<?php

	include("classeForm.php");
	include("autenticacao.php");
	include("conexao.php");
	
	
	$parametros = null;

	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="clientes";
		$coluna[]= "id_cliente";
		$coluna[]= "nome";
		$coluna[]= "sobrenome";
		$coluna[]= "data_nascimento";
		$coluna[]= "sexo";
		$coluna[]= "telefone";
		$coluna[]= "endereco";
		$coluna[]= "email";
		
		$condicao[] = " id_cliente=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera_cliente.php?tabela=cliente&id=".$_GET["id"];
	}
	else{
		$resultado[0]["id_cliente"] = "";
		$resultado[0]["nome"] = "";
		$resultado[0]["sobrenome"] = "";
		$resultado[0]["data_nascimento"] = "";
		$resultado[0]["sexo"] = "";
		$resultado[0]["telefone"] = "";
		$resultado[0]["endereco"] = "";
		$resultado[0]["email"] = "";
		
		$parametros["action"] = "insere.php?tabela=cliente";
	}


	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "id_cliente";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["id_cliente"];
	$parametros["placeholder"] = "Digite o CPF do cliente...";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "nome";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["nome"];
	$parametros["placeholder"] = "Digite o nome do cliente...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "sobrenome";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["sobrenome"];
	$parametros["placeholder"] = "Digite o sobrenome do cliente...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "data_nascimento";
	$parametros["type"] = "date";
	$parametros["value"] = $resultado[0]["data_nascimento"];	
	$parametros["label"] = "Data de Nascimento";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "sexo";
	$parametros["type"] = "radio";
	$parametros["opcoes"] = array("m"=>"Masc.","f"=>"Fem.");
	$parametros["label"] = "Sexo";
	$parametros["value"] = $resultado[0]["sexo"];	
	$f->add_inputOpcoes($parametros);

	$parametros = null;
	$parametros["name"] = "telefone";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["telefone"];	
	$parametros["placeholder"] = "Digite o telefone do cliente...";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "endereco";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["endereco"];	
	$parametros["placeholder"] = "Digite o endereco do cliente...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "email";
	$parametros["type"] = "email";
	$parametros["value"] = $resultado[0]["email"];	
	$parametros["placeholder"] = "Digite o email do cliente...";	
	$f->add_input($parametros);	

	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	
	$f->exibe();
	
?>
