$(function(){

    function funcao_alterar(){
        
        cod_hotel= $(this).closest("tr").children("td:nth-child(1)").html();
        cod_facilidade = $(this).closest("tr").children("td:nth-child(2)").html();       
        
        $("select[name=cod_hotel] option").each(function(){
            this.selected = $(this).html()== cod_hotel;
        });
        $("select[name=cod_facilidade] option").each(function(){
            this.selected = $(this).html()== cod_facilidade;
        });	
    }

    $('.alterar').click(funcao_alterar);
});