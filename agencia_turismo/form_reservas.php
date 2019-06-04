<?php
	include("autenticacao.php");
	include("classeForm.php");	
	
	$parametros = null;
	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="reserva";
		$coluna[]= "id_reserva";
        $coluna[]= "cod_cliente";
        $coluna[]= "cod_hotel";
        $coluna[]= "cod_companhia";
        $coluna[]= "origem_destino";
        $coluna[]= "check_in";
        $coluna[]= "check_out";
        $coluna[]= "qnt_viajantes";
        $coluna[]= "data_compra";
        $coluna[]= "status_pagamento";
        $coluna[]= "status_reserva";
        $coluna[]= "valor_total";
		$condicao[] = " id_pais=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=reserva&id=".$_GET["id"];
	}
	else{
		$resultado[0]["id_reserva"] = "";
        $resultado[0]["cod_cliente"] = "";
        $resultado[0]["cod_hotel"] = "";
        $resultado[0]["cod_companhia"] = "";
        $resultado[0]["origem_destino"] = "";
        $resultado[0]["check_in"] = "";
        $resultado[0]["check_out"] = "";
        $resultado[0]["qnt_viajantes"] = "";
        $resultado[0]["data_compra"] = "";
        $resultado[0]["status_pagamento"] = "";
        $resultado[0]["status_reserva"] = "";
        $resultado[0]["valor_total"] = "";

		$parametros["action"] = "insere.php?tabela=reserva";
	}
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	/*$parametros = null;
	$parametros["name"] = "id_reserva";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["id_reserva"];
	$parametros["placeholder"] = "Digite o ID da reserva...";	
    $f->add_input($parametros);*/

    //Select clientes
    $consulta = "SELECT id_cliente as value, nome as label FROM cliente ORDER BY id_cliente";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$clientes[] = $linha;
	}	
	$f->add_select("cliente", $clientes, $resultado[0]["cod_cliente"]);
    
    //Select hotéis
    $consulta = "SELECT id_hotel as value, nome as label FROM hotel ORDER BY id_hotel";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$hoteis[] = $linha;
	}	
	$f->add_select("hotel", $hoteis, $resultado[0]["cod_hotel"]);
    

    //Select companhias
    $consulta = "SELECT id_companhia as value, nome_companhia as label FROM companhia ORDER BY id_companhia";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$companhias[] = $linha;
	}	
	$f->add_select("companhia", $companhias, $resultado[0]["cod_companhia"]);
    
    //Select origem-destino
    $consulta = "SELECT id_companhia_origem_destino as value, cod_origem as label FROM companhia_origem_destino ORDER BY id_companhia_origem_destino";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$trechos[] = $linha;
	}	
	$f->add_select("companhia_origem_destino", $trechos, $resultado[0]["origem_destino"]);
    

    $parametros = null;
	$parametros["name"] = "check_in";
	$parametros["type"] = "date";
    $parametros["value"] = $resultado[0]["check_in"];
    $parametros["label"] = "Check-in";
	$parametros["placeholder"] = "Digite o chek-in da reserva...";	
    $f->add_input($parametros);
    
    $parametros = null;
	$parametros["name"] = "check_out";
	$parametros["type"] = "date";
    $parametros["value"] = $resultado[0]["check_in"];
    $parametros["label"] = "Check-out";
	$parametros["placeholder"] = "Digite o chek-in da reserva...";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "qnt_viajantes";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["qnt_viajantes"];
	$parametros["placeholder"] = "Digite a qnt de pessoas...";	
    $f->add_input($parametros);
    
    $parametros = null;
	$parametros["name"] = "data_compra";
	$parametros["type"] = "date";
    $parametros["value"] = $resultado[0]["data_compra"];
    $parametros["label"] = "Data da compra";
	$parametros["placeholder"] = "Digite data da compra da reserva...";	
    $f->add_input($parametros);
    
    $parametros = null;
	$parametros["name"] = "status_pagamento";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["status_pagamento"];
	$parametros["placeholder"] = "status_pagamento...";	
    $f->add_input($parametros);

    $parametros = null;
	$parametros["name"] = "status_reserva";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["status_reserva"];
	$parametros["placeholder"] = "status_reserva...";	
    $f->add_input($parametros);

    $parametros = null;
	$parametros["name"] = "valor_total";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["valor_total"];
	$parametros["placeholder"] = "valor_total...";	
    $f->add_input($parametros);

	$f->exibe();
	
?>
 
	
	