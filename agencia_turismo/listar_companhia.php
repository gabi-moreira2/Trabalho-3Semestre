<?php


	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	
	include("form_companhia.php");

	$tabela[]="companhia";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "id_companhia as ID";
	$coluna[]= "nome_companhia as Companhia";
	$coluna[]= "email as 'E-mail'";
	$coluna[]= "tipo_viagem as 'Tipo de viagem'";	


	$condicao = null;
	$ordenacao = "nome_companhia";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"companhia",true,true);
	
	$t->exibe();

?>
	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/alterar_companhia.js"></script>
</body>
</html>