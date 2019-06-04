$(function(){

    function funcao_alterar(){
        
        id_pais= $(this).closest("tr").children("td:nth-child(1)").html();
        nome = $(this).closest("tr").children("td:nth-child(2)").html();
        
        
        $("input[name=id_pais]").val(id_pais);
        $("input[name=nome]").val(nome);
        //$("select[name=cod_estado] option").each(function(){
        //	this.selected = $(this).html()==uf;
        //});
        
    }


    $('.alterar').click(funcao_alterar);


});