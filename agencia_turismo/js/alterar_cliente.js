$(function(){

		function funcao_alterar(){
			
			id_cliente = $(this).closest("tr").children("td:nth-child(1)").html();
			nome = $(this).closest("tr").children("td:nth-child(2)").html();
			sobrenome = $(this).closest("tr").children("td:nth-child(3)").html();
			data_nascimento = $(this).closest("tr").children("td:nth-child(4)").html();
			sexo = $(this).closest("tr").children("td:nth-child(5)").html(); //MASC OU FEM
			telefone = $(this).closest("tr").children("td:nth-child(6)").html();
			endereco = $(this).closest("tr").children("td:nth-child(7)").html();
			email = $(this).closest("tr").children("td:nth-child(8)").html();
			
			
			$("input[name=id_cliente]").val(id_cliente);
			$("input[name=nome]").val(nome);
			$("input[name=sobrenome]").val(sobrenome);
			$("input[name=data_nascimento]").val(data_nascimento);
			$("input[name=sexo]").val(sexo);
			$("input[name=telefone]").val(telefone);
			$("input[name=endereco]").val(endereco);
			$("input[name=email]").val(email);
			//$("select[name=cod_estado] option").each(function(){
			//	this.selected = $(this).html()==uf;
			//});
			
		}


		$('.alterar').click(funcao_alterar);


});