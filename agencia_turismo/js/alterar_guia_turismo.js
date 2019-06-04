$(function(){

    function funcao_alterar(){
        
        id_guia = $(this).closest("tr").children("td:nth-child(1)").html();
        nome = $(this).closest("tr").children("td:nth-child(2)").html(); 
        telefone = $(this).closest("tr").children("td:nth-child(3)").html(); 
        email = $(this).closest("tr").children("td:nth-child(4)").html(); 
        cod_companhia_origem_destino = $(this).closest("tr").children("td:nth-child(5)").html();       
        preco = $(this).closest("tr").children("td:nth-child(6)").html();

        $("input[name=id_guia]").val(id_guia);
        $("input[name=nome]").val(nome);
        $("input[name=telefone]").val(telefone);
        $("input[name=email]").val(email);
        $("select[name=cod_companhia_origem_destino] option").each(function(){
            this.selected = $(this).html()== cod_companhia_origem_destino;
        });	
        $("input[name=preco]").val(preco);
    }

    $('.alterar').click(funcao_alterar);
});