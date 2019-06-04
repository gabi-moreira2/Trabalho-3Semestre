<?php


	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	
	include("form_facilidades.php");

    $tabela[]="facilidade";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "id_facilidade as ID";
    $coluna[]= "nome_facilidade as Facilidade";
    $coluna[]= "descricao as Descricao";


	$condicao = null;
	$ordenacao = "id_facilidade";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"facilidade",true,true);
	
	$t->exibe();

?>
<script src="js/alterar_facilidade.js"></script>
</body>
</html>