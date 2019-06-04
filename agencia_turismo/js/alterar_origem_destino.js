$(function(){

    function funcao_alterar(){
        
        cod_companhia = $(this).closest("tr").children("td:nth-child(1)").html(); 
        cod_origem = $(this).closest("tr").children("td:nth-child(2)").html();
		cod_destino = $(this).closest("tr").children("td:nth-child(3)").html();       
        valor_passagens = $(this).closest("tr").children("td:nth-child(4)").html();

        $("select[name=cod_companhia] option").each(function(){
            this.selected = $(this).html()== cod_companhia;
        });
        $("select[name=cod_origem] option").each(function(){
            this.selected = $(this).html()== cod_origem;
        });
        $("select[name=cod_destino] option").each(function(){
            this.selected = $(this).html()== cod_destino;
        });
        $("input[name=valor_passagem]").val(valor_passagens);
    }

    $('.alterar').click(funcao_alterar);
});