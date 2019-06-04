<?php


	include("classeCabecalho.php");
	$c->exibe_menu();	
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	include("form_reservas.php");

	$tabela[]="info_reserva";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "cliente";
	$coluna[]= "hotel";
    $coluna[]= "companhia";
    $coluna[]= "origem_destino";
    $coluna[]= "check_in";
    $coluna[]= "check_out";
    $coluna[]= "qnt_viajantes";
    $coluna[]= "data_compra";
    $coluna[]= "status_pagamento";
    $coluna[]= "status_reserva";
    $coluna[]= "valor_total";
	
	$condicao = null;
	$ordenacao = null;

	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		
	$t = new Tabela($m,"info_reserva", true, true);
	
	$t->exibe();

?>

<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/alterar_reserva.js"></script>
</body>
</html>