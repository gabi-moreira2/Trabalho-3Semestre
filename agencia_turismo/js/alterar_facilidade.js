$(function(){

    function funcao_alterar(){
        
        id_facilidade= $(this).closest("tr").children("td:nth-child(1)").html();
        nome_facilidade = $(this).closest("tr").children("td:nth-child(2)").html();
		descricao = $(this).closest("tr").children("td:nth-child(3)").html();
        
        
        $("input[name=id_facilidade]").val(id_facilidade);
        $("input[name=nome_facilidade]").val(nome_facilidade);
		$("input[name=descricao]").val(descricao);
        
    }


    $('.alterar').click(funcao_alterar);


});