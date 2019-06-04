$(function(){

    function funcao_alterar(){
        
        id_hotel= $(this).closest("tr").children("td:nth-child(1)").html();
        nome = $(this).closest("tr").children("td:nth-child(2)").html();
        telefone = $(this).closest("tr").children("td:nth-child(3)").html();
        email = $(this).closest("tr").children("td:nth-child(4)").html(); 
        tipo_quarto = $(this).closest("tr").children("td:nth-child(5)").html();
        qnt_quarto = $(this).closest("tr").children("td:nth-child(6)").html();
        preco_diaria = $(this).closest("tr").children("td:nth-child(7)").html();  
        cod_cidade = $(this).closest("tr").children("td:nth-child(8)").html();        
        
        $("input[name=id_hotel]").val(id_hotel);
        $("input[name=nome]").val(nome);
		$("input[name=telefone]").val(telefone); 
        $("input[name=email]").val(email);
        $("input[name=tipo_quarto]").val(tipo_quarto);	
        $("input[name=qnt_quarto]").val(qnt_quarto);
        $("input[name=preco_diaria]").val(preco_diaria);
        $("select[name=cod_cidade] option").each(function(){
            this.selected = $(this).html()== cod_cidade;
        });	
    }

    $('.alterar').click(funcao_alterar);
});