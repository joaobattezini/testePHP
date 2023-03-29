
// $("#formAnuncio").on("submit", function (event) {
    var idCliente;
    var tablePedidos;
    var $ = $.noConflict();
    
    // $(document).ready(function () {
    //     tablePedidos = $('#idTablePedidos').DataTable({
        $(document).ready(function() {
            tablePedidos = $('#idTablePedidos').DataTable({
            autoWidth: true,
            responsive: true,
            serverSide: false,
            ajax: {
                url: "../../json/getPedidos.php",
                type: "POST",
                datatype: "json",
                data: function (d) {
                    d.filtro = $("ul.filtroBtnTab li a.active").data('filtro');
                },
                dataSrc: function (json) {
                    if (json.data === null) {
                        return [];
                    }
                    return json.data;
                }
            },
            language: {
                emptyTable: "Nenhum registro encontrado!"
            },
            columns: [
                { "data": "idCliente" },
                { "data": "valorPedido" },
                { "data": "localEntrega" },
                { "data": "valorFrete" },
                { "data": "dataEntrega" }
            ]
        });
    });
        $("#btnModalPedidos").on('click', function () {
            $("#idModalPedidos").load("../modal/modalPedidos.php", function (result) {
                // Once the modal content is loaded, we show the modal window
                $.ajax({
                    url: '../../json/getClientes.php',
                    type: 'POST',
                    success: function (json) {
                        $("#selCliente").empty();
                        var options = '<option value="">Selecione o Cliente </option>';
                        $.each(json.data, function (key, dados) {
                            var sel = "";
                            options += '<option value="' + dados.idCliente + '" ' + sel + '>' + dados.nmCliente + '</option>';
                        });
                        $('#selCliente').append(options);
                    }
                });
                $('#idModalPedidos').modal('show');
            });
        });

    

        
$(document).on("submit", "#formPedidos", function (event) {
    // $(".btnSalvarPropriedades").on("click", function(){
    event.preventDefault();
    // console.log("alert")
            $.post("../../json/cadPedidos.php", {
                // idInsumo: $('#idModalInsumos').data("idinsumo"),
                dataEntrega: $('#txtEntrega').val(),
                valorPedido: $('#txtValor').val(),
                valorFrete: $("#txtFrete").val(),
                localEntrega: $("#txtLocal").val(),
                acao: $('#idHdAcao').val()
            }).done(function (data) {
                if (data.status == 'success') {
                    $('#idModalPedidos').modal('hide');
                    toastr.success(data.msg, "Ok");
                }
                else {
                    toastr["warning"](data.msg, "Ops");
                }
            }).fail(function (data) {
                toastr["warning"](data.msg, "Ops");
            });
            $('#idEtdModal').modal('hide');
        });
        
    //     // submete o formulário
    //     $("#formPedidos").submit();
 
    
    // $(document).on("click", "#formPedidos", function (event) {
    //     $.post("../../json/cadPedidos.php", {
    //         // idInsumo: $('#idModalInsumos').data("idinsumo"),
    //         dataEntrega: $('#txtEntrega').val(),
    //         valorPedido: $('#txtValor').val(),
    //         valorFrete: $("#txtFrete").val(),
    //         localEntrega: $("#txtLocal").val(),
    //         acao: $('#idHdAcao').val()
    //     }).done(function (data) {
    //         if (data.status == 'success') {
    //             $('#idModalInsumos').modal('hide');
    //             toastr.success(data.msg, "Ok");
    //             $('#idTableInsumos').DataTable().ajax.reload();
    //         }
    //         else {
    //             toastr["warning"](data.msg, "Ops");
    //         }
    //     }).fail(function (data) {
    //         toastr["warning"](data.msg, "Ops");
    //     });
    //     $('#idEtdModal').modal('hide');
    // });










