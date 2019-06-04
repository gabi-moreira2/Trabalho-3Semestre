<?php
	
	include("autenticacao.php");
	include("classeForm.php");
	include("conexao.php");

	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=hotel";
	$parametros["method"] = "post";
	
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "id_hotel";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "ID do hotel";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "nome";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Nome do hotel";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "telefone";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Telefone do hotel";	
	$f->add_input($parametros);	

	$parametros = null;
	$parametros["name"] = "email";
	$parametros["type"] = "email";
	$parametros["placeholder"] = "E-mail do hotel";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "tipo_quarto";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Tipo de quarto disponível";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "qnt_quarto";
	$parametros["type"] = "number";
	$parametros["placeholder"] = "Quantidade de quartos";	
    $f->add_input($parametros);
    
    $parametros = null;
	$parametros["name"] = "preco_diaria";
	$parametros["type"] = "number";
	$parametros["placeholder"] = "Preço da diária";	
	$f->add_input($parametros);

	$consulta = "SELECT id_cidade as value, 
				 nome as label 
				 FROM cidade 
				 ORDER BY id_cidade";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$cidades[] = $linha;
	}	
	$f->add_select("cod_cidade", $cidades,null);

	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	
	$f->exibe();
	
?>
