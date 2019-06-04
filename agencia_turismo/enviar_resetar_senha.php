<?php
    include("classeCabecalho.php");
    $c->exibe_menu();
    include("classeBancoDeDados.php");

    @$chave = md5($_POST["email"].date("Ymdhis"));
    $op = new BancoDeDados($conexao);
       
    $tabela[]="cliente";	
	$coluna[]= "id_cliente as id";
    $condicao[] = "email='".$_POST["email"]."'";
    $ordenacao = "";
    $m = $op->select($tabela,$coluna,$condicao, $ordenacao);

    $id = $m[0]["id"];
    $valores = array("codigo_alteracao"=>$chave);
    $op->alterar($valores, "cliente", $id);

    $from = "gabrieli.moreira@outlook.com.br";
    $fromName="Mensagem do sistema";
    $subject = "Voce solicitou o reset de senha";
    $mensagem = "Voce solicitou o reset de senha.<br/><br/>
                <a href='localhostAula20-EnvioEmail/rede_loja_bootstrap_login_menuToggle_tabela/resetar_senha.php?email=".$_POST["email"]."&codigo_alteracao=$chave>Clique aqui<a/>";
    include("email.php");

    echo "Seu reset de senha foi enviado. Confira seu e-mail.";

?>

<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>