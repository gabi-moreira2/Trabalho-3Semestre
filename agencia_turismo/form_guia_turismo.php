<?php
	include("autenticacao.php");
	include("classeForm.php");	
	
	$parametros = null;
	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="pais";
		$coluna[]= "id_guia";
		$coluna[]= "nome";
		$coluna[]= "telefone";
		$coluna[]= "email";
		$coluna[]= "cod_companhia_origem_destino";
		$coluna[]= "preco";
		$condicao[] = " id_guia=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=guia_turismo&id=".$_GET["id"];
	}
	else{
		$resultado[0]["id_guia"] = "";
		$resultado[0]["nome"] = "";
		$resultado[0]["telefone"] = "";
		$resultado[0]["email"] = "";
		$resultado[0]["cod_companhia_origem_destino"] = "";
		$resultado[0]["preco"] = "";
		$parametros["action"] = "insere.php?tabela=guia_turismo";
	}
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "id_guia";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["id_guia"];
	$parametros["placeholder"] = "Digite o CPF do guia...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "nome";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["nome"];
	$parametros["placeholder"] = "Digite o nome do guia...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "telefone";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["telefone"];
	$parametros["placeholder"] = "Digite o telefone do guia...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "email";
	$parametros["type"] = "email";
	$parametros["value"] = $resultado[0]["email"];
	$parametros["placeholder"] = "Digite o e-mail do guia...";	
	$f->add_input($parametros);

	$consulta = "SELECT id_companhia_origem_destino as value, id_companhia_origem_destino as label FROM companhia_origem_destino ORDER BY id_companhia_origem_destino";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$trechos[] = $linha;
	}	
	$f->add_select("cod_companhia_origem_destino", $trechos, $resultado[0]["cod_companhia_origem_destino"]);
	

	$parametros = null;
	$parametros["name"] = "preco";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["preco"];
	$parametros["placeholder"] = "Digite o preco do guia...";	
	$f->add_input($parametros);
	
	$f->exibe();
	
?>

 
	
	