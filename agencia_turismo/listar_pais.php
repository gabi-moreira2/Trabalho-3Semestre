<?php

	include("classeCabecalho.php");
	$c->exibe_menu();
	
	include("form_pais.php");

	include("classeTabela.php");
	include("classeBancoDeDados.php");

	$tabela[]="pais";
	
	$coluna[]= "id_pais as ID";
	$coluna[]= "nome as Nome";
	
	$condicao = null;
	$ordenacao = "nome";

	$bd = new BancoDeDados($conexao);
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$t = new Tabela($m,"pais",true,true);
	
	$t->exibe();

?>
	
	<script src="js/alterar_pais.js"></script>
</body>
</html>