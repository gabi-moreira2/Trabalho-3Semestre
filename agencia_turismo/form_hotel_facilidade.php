<?php

	include("classeForm.php");
	include("autenticacao.php");
	include("conexao.php");
	
	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=hotel_facilidade";
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$consulta = "SELECT id_hotel as value, nome as label 
							FROM hotel ORDER BY nome";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$hoteis[] = $linha;
	}	
	$f->add_select("cod_hotel", $hoteis,null);


	$consulta = "SELECT id_facilidade as value, nome_facilidade as label 
							FROM facilidade ORDER BY nome_facilidade";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$facilidades[] = $linha;
	}	
	$f->add_select("cod_facilidade", $facilidades, null);
	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	
	$f->exibe();
	
?>
