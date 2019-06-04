<?php


	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	include("form_cartao.php");


	$tabela[]="cartao";
	$tabela[]="cliente";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "cliente.nome as Cliente";
	$coluna[]= "numero_cartao as 'Número do Cartão'";
	$coluna[]= "nome_titular as 'Nome do titular'";
	$coluna[]= "empresa as Empresa";
	$coluna[]= "tipo_cartao as Tipo";
	
	$condicao = null;
	$ordenacao = "cliente.nome";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"cartao",true,true);
	try{
		$t->exibe();
	}
	catch(Exception $e){
		$e->get_message();
	};

?>
<script src="js/alterar_cartao.js"></script>
</body>
</html>