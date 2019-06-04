$(function(){

		function funcao_alterar(){
            
            cliente = $(this).closest("tr").children("td:nth-child(1)").html();
			numero_cartao = $(this).closest("tr").children("td:nth-child(2)").html();
			nome_titular = $(this).closest("tr").children("td:nth-child(3)").html();
			empresa = $(this).closest("tr").children("td:nth-child(4)").html();
			tipo = $(this).closest("tr").children("td:nth-child(5)").html();
			
			
			$("input[name=numero_cartao]").val(numero_cartao);
			$("input[name=nome_titular]").val(nome_titular);
			$("input[name=empresa]").val(empresa);
			$("input[name=tipo_cartao]").val(tipo);
			$("select[name=cod_cliente] option").each(function(){
				this.selected = $(this).html()== cliente;
			});
			
		}


		$('.alterar').click(funcao_alterar);


})