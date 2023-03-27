// $("#formAnuncio").on("submit", function (event) {
var tableClientes;
var idCliente;

// $(document).ready(function () {

//     tableClientes = $('#idTablePedidos').DataTable({
//         autoWidth: true,
//         responsive: true,
//         serverSide: false,
//         ajax: {
//             url: "../../json/getPedidos.php",
//             type: "POST",
//             datatype: "json",
//             data: function (d) {
//                 d.filtro = $("ul.filtroBtnTab li a.active").data('filtro');
//             },
//             dataSrc: function (json) {
//                 if (json.data === null) {
//                     return [];
//                 }
//                 return json.data;
//             }
//         },
//         language: {
//             emptyTable: "Nenhum registro encontrado!"
//         },
//         columns: [
//             { "data": "idCliente" },
//             { "data": "dataEntrega" },
//             { "data": "valorPedido" },
//             { "data": "valorFrete" },
//             { "data": "localEntrega" }
//         ]
//     });
// });

$(document).ready(function () {
    $("#btnModalPedidos").on('click', function () {
        $("#idModalPedidos").load("../modal/modalPedidos.php", function (result) {
            // Once the modal content is loaded, we show the modal window
            $('#idModalPedidos').modal('show');
        });
    });
});


$(document).on("click", "#btnSalvar", function (event) {
    event.preventDefault(); // impede o comportamento padrão do botão salvar
    
    $("#formPedidos").submit(function(event) {
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
    
    // submete o formulário
    $("#formPedidos").submit();
});


// $(document).on("click", "#formPedidos", function (event) {
//     alert("aqui")
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