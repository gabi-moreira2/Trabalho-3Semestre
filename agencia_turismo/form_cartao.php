<?php
	
	include("autenticacao.php");
	include("classeForm.php");
	include("conexao.php");

	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=cartao";
	$parametros["method"] = "post";
	
	
	$f = new Form($parametros);

	$consulta = "SELECT id_cliente as value, 
				 cliente.nome as label 
				 FROM cliente
				 ORDER BY id_cliente";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$clientes[] = $linha;
	}	
	$f->add_select("cod_cliente", $clientes,null);
	
	$parametros = null;
	$parametros["name"] = "numero_cartao";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Número do cartão";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "nome_titular";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Nome do titular";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "empresa";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Empresa";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "tipo_cartao";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Tipo do cartão";	
	$f->add_input($parametros);
	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	
	$f->exibe();
	
?>
