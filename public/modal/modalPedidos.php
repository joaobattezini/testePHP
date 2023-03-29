
<!-- <div class="modal fade" id="modalPropriedades" tabindex="-1"> -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Cadastro de Pedidos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formPedidos">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="#selCliente">Cliente :</label>
                                    <select class="form-control" id="selCliente">
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default"><i class="la la-calendar"></i>
                                    <label>Data da Entrega :</label>
                                    <input id="txtEntrega" type="date" class="form-control" placeholder="Nome da Propriedade">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Local de Entrega :</label>
                                    <input id="txtLocal" type="text" class="form-control"
                                        placeholder="Local de Entrega" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Valor Pedido :</label>
                                    <input id="txtValor" type="text" class="form-control"
                                        placeholder="R$ Valor" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Valor Frete :</label>
                                    <input id="txtFrete" type="text" class="form-control"
                                        placeholder="R$ Frete" >
                                </div>
                            </div>
                        </div>
                            <input type="hidden" id="idCliente">
                            <input type="hidden" id="idGrupo">
                            <input type="hidden" id="idHdAcao" value="insert">
                        </div>
                        <div class="modal-footer no-bd">
                            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-success" id="btnSalvar" type="submit">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- </div> -->