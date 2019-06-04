<?php
	
	include("autenticacao.php");
	include("classeForm.php");
	include("conexao.php");

	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=companhia_origem_destino";
	$parametros["method"] = "post";
	
	
	$f = new Form($parametros);
	
	$consulta = "SELECT id_companhia as value, 
				 companhia.id_companhia as label 
				 FROM companhia 
				 ORDER BY id_companhia";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$companhia[] = $linha;
	}	
	$f->add_select("cod_companhia",$companhia,null);
	

	$consulta = "SELECT id_cidade as value, 
				 cidade.id_cidade as label 
				 FROM cidade 
				 ORDER BY id_cidade";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$origens[] = $linha;
	}	
	$f->add_select("cod_origem",$origens,null);

	$consulta = "SELECT id_cidade as value, 
				 cidade.id_cidade as label 
				 FROM cidade 
				 ORDER BY id_cidade";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$destinos[] = $linha;
	}	
	$f->add_select("cod_destino",$destinos,null);
	
	$parametros = null;
	$parametros["name"] = "valor_passagem";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Valor das passagens";	
	$f->add_input($parametros);

	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	
	$f->exibe();
	
?>
