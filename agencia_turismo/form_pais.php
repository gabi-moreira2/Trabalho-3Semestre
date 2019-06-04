<?php
	include("autenticacao.php");
	include("classeForm.php");	
	
	$parametros = null;
	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="pais";
		$coluna[]= "id_pais";
		$coluna[]= "nome";
		$condicao[] = " id_pais=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=pais&id=".$_GET["id"];
	}
	else{
		$resultado[0]["id_pais"] = "";
		$resultado[0]["nome"] = "";
		$parametros["action"] = "insere.php?tabela=pais";
	}
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "id_pais";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["id_pais"];
	$parametros["placeholder"] = "Digite o ID pais...";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "nome";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["nome"];
	$parametros["placeholder"] = "Digite o pais...";	
	$f->add_input($parametros);

	$f->exibe();
	
?>
 
	
	