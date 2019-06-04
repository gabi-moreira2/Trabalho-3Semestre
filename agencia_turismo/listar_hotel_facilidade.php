<?php


	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	include("form_hotel_facilidade.php");


	$tabela[]="info_hotel_facilidades";

	$bd = new BancoDeDados($conexao);	
	
	$coluna[]= "Hotel";
	$coluna[]= "Facilidade";
	$coluna[]= "Descricao";


	
	$condicao = null;
	$ordenacao = null;
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"info_hotel_facilidade",true,true);
	
	$t->exibe();

?>
	<script src="js/alterar_hotel_facilidade.js"></script>
</body>
</html>