$(function(){

    function funcao_alterar(){
        
        id_companhia= $(this).closest("tr").children("td:nth-child(1)").html();
        nome_companhia = $(this).closest("tr").children("td:nth-child(2)").html();
        email = $(this).closest("tr").children("td:nth-child(3)").html();
		tipo_viagem = $(this).closest("tr").children("td:nth-child(4)").html();        
        
        $("input[name=id_companhia]").val(id_companhia);
        $("input[name=nome_companhia]").val(nome_companhia);
		$("input[name=email]").val(email); 
		$("input[name=tipo_viagem]").val(tipo_viagem);		
    }

    $('.alterar').click(funcao_alterar);
});