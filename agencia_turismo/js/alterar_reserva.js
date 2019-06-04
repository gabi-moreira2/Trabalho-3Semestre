$(function(){

    function funcao_alterar(){
        
        cliente = $(this).closest("tr").children("td:nth-child(1)").html();
        hotel = $(this).closest("tr").children("td:nth-child(2)").html(); 
        compahia = $(this).closest("tr").children("td:nth-child(3)").html(); 
        origem_destino = $(this).closest("tr").children("td:nth-child(4)").html();       
        check_in = $(this).closest("tr").children("td:nth-child(5)").html();
        check_out = $(this).closest("tr").children("td:nth-child(6)").html();
        qnt_viajantes = $(this).closest("tr").children("td:nth-child(7)").html();
        data_compra = $(this).closest("tr").children("td:nth-child(8)").html();
        status_pagamento = $(this).closest("tr").children("td:nth-child(9)").html();
        status_reserva = $(this).closest("tr").children("td:nth-child(10)").html();
        valor_total = $(this).closest("tr").children("td:nth-child(11)").html();

        $("select[name=cliente] option").each(function(){
            this.selected = $(this).html()== cliente;
        });
        $("select[name=hotel] option").each(function(){
            this.selected = $(this).html()== hotel;
        });
        $("select[name=compahia] option").each(function(){
            this.selected = $(this).html()== compahia;
        });
        $("select[name=companhia_origem_destino] option").each(function(){
            this.selected = $(this).html()== origem_destino;
        });
        $("input[name=check_in]").val(check_in);
        $("input[name=check_out]").val(check_out);
        $("input[name=qnt_viajantes]").val(qnt_viajantes);
        $("input[name=data_compra]").val(data_compra);
        $("input[name=status_pagamento]").val(status_pagamento);
        $("input[name=status_reserva]").val(status_reserva);
        $("input[name=valor_total]").val(valor_total);
    }

    $('.alterar').click(funcao_alterar);
});