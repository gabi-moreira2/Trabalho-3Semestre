<?php

	include("classeCabecalho.php");
	$c->exibe_menu();
	include("conexao.php");
	include("form_guia_turismo.php");

	include("classeTabela.php");
	include("classeBancoDeDados.php");

    $tabela[]="guia_turismo";
	
	$coluna[]= "guia_turismo.id_guia as ID";
    $coluna[]= "guia_turismo.nome as Nome";
    $coluna[]= "guia_turismo.telefone as Telefone";
    $coluna[]= "guia_turismo.email as Email";
    $coluna[] = "guia_turismo.cod_companhia_origem_destino as 'Origem-Destino'";
    $coluna[]= "guia_turismo.preco as Preço";
    
	$condicao = null;
	$ordenacao = "nome";

	$bd = new BancoDeDados($conexao);
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$t = new Tabela($m,"guia_turismo",true,true);
	
	$t->exibe();

?>
	
	<script src="js/alterar_guia_turismo.js"></script>
</body>
</html>