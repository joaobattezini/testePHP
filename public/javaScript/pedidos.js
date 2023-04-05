
    var idCliente;
    var tablePedidos;
    var $ = $.noConflict();
    
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
                // Once the modal content is loaded, we show the modal windo
                $('#idModalPedidos').modal('show');

                $.ajax({
                    url: '../../json/getClientes.php',
                    type: 'POST',
                    dataType: 'json', // especifique o tipo de dados como JSON
                    success: function (json) {
                    //   console.log(json); // verifique o que é retornado pelo servidor
                      $("#selCliente").empty();
                      var options = '<option value="">Selecione o Cliente </option>';
                      $.each(json, function (key, dados) { // percorra o array de objetos
                        options += '<option value="' + dados.cliente + '" >' + dados.nmcliente + '</option>';
                        console.log(options)
                      });
                      $('#selCliente').append(options);
                    },
                    error: function (xhr, status, error) {
                      console.log(error); // verifique o erro retornado pelo servidor
                    }
                  });

            });
        });


        
$(document).on("submit", "#formPedidos", function (event) {
    // $(".btnSalvarPropriedades").on("click", function(){
    event.preventDefault();
    // console.log("alert")
            $.post("../../json/cadPedidos.php", {
                // idInsumo: $('#idModalInsumos').data("idinsumo"),
                idCliente: $('#selCliente').val(),
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
        





