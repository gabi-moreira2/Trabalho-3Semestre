<?php


	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	
	include("form_cliente.php");

	$tabela[]="cliente";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "id_cliente as ID";
	$coluna[]= "nome as Nome";
	$coluna[]= "sobrenome as Sobrenome";
	$coluna[]= "data_nascimento as 'Data de Nascimento'";
	$coluna[]= "sexo as Sexo";
	$coluna[]= "telefone as Telefone";
	$coluna[]= "endereco as Endereço";
	$coluna[]= "email as Email";
	$coluna[]= "senha as Senha";
	$coluna[]= "permissao as Permissão";
	


	$condicao = null;
	$ordenacao = "nome";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"cliente",true,true);
	
	$t->exibe();
?>
	<script src="js/alterar_cliente.js"></script>
</body>
</html>