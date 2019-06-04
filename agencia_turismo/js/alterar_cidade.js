$(function(){

    function funcao_alterar(){
        
        id_cidade= $(this).closest("tr").children("td:nth-child(1)").html();
        nome = $(this).closest("tr").children("td:nth-child(2)").html();
        cod_pais = $(this).closest("tr").children("td:nth-child(3)").html();

        
        
        $("input[name=id_cidade]").val(id_cidade);
        $("input[name=nome]").val(nome);
        $("select[name=cod_pais] option").each(function(){
            this.selected = $(this).html()== cod_pais;
        });
        
    }


    $('.alterar').click(funcao_alterar);


});