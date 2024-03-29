<?php

	include("classeForm.php");
	include("autenticacao.php");
	include("conexao.php");
	
	
	$parametros = null;
	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="cidade";
		$coluna[]= "id_cidade";
		$coluna[]= "nome";
		$coluna[]= "cod_pais";
		$condicao[] = " id_cidade=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=cidade&id=".$_GET["id"];
	}
	else{
		$resultado[0]["id_cidade"] = "";
		$resultado[0]["nome"] = "";
		$resultado[0]["cod_pais"] = "";
		$parametros["action"] = "insere.php?tabela=cidade";
	}
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "id_cidade";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["id_cidade"];
	$parametros["placeholder"] = "Digite a cidade...";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "nome";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["nome"];
	$parametros["placeholder"] = "Digite a cidade...";	
	$f->add_input($parametros);

	$consulta = "SELECT id_pais as value, nome as label FROM pais ORDER BY nome";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$paises[] = $linha;
	}	
	$f->add_select("cod_pais", $paises, $resultado[0]["cod_pais"]);
	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	
	$f->exibe();
	
?>
