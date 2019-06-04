<?php


	include("classeCabecalho.php");
	$c->exibe_menu();
	
	include("classeTabela.php");
	include("classeBancoDeDados.php");

	include("form_cidade.php");


	$tabela[]="cidade";
	$tabela[]="pais";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "id_cidade as ID";
	$coluna[]= "cidade.nome as Cidade";
	$coluna[]= "pais.nome as País";
	
	$condicao = null;
	$ordenacao = "cidade.nome";

	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		
	$t = new Tabela($m,"cidade", true, true);
	
	$t->exibe();

?>

	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/alterar_cidade.js"></script>
</body>
</html>