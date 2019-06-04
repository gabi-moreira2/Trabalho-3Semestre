<?php


	include("classeCabecalho.php");
	$c->exibe_menu();	
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	include("form_companhia_origem_destino.php");


	
    //$tabela[]="companhia";
	$tabela[]="companhia_origem_destino";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "cod_companhia";
    $coluna[]= "cod_origem as Origem";
    $coluna[]= "cod_destino as Destino";
    $coluna[]= "valor_passagem as 'Valor das passagens'";
	
	$condicao = null;
	$ordenacao = "id_companhia_origem_destino";

	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		
	$t = new Tabela($m,"companhia_origem_destino", true, true);
	
	$t->exibe();

?>

<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/alterar_origem_destino.js"></script>
</body>
</html>