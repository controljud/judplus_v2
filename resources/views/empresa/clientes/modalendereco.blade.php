<div class="modal fade" id="modal-endereco">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Adicionar endereço</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="txCep">Cep</label>
                        <input type="text" class="form-control" id="txCep" name="txCep" placeholder="Cep" autocomplete="off"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="txRua">Rua</label>
                        <input type="text" class="form-control" id="txRua" name="txRua" placeholder="Rua" autocomplete="off"/>
                    </div>
                    <div class="col-md-3">
                        <label for="txNumero">Número</label>
                        <input type="text" class="form-control" id="txNumero" name="txNumero" placeholder="Número" autocomplete="off"/>
                    </div>
                    <div class="col-md-4">
                        <label for="txComplemento">Complemento</label>
                        <input type="text" class="form-control" id="txComplemento" name="txComplemento" placeholder="Número" autocomplete="off"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="txBairro">Bairro</label>
                        <input type="text" class="form-control" id="txBairro" name="txBairro" placeholder="Bairro" autocomplete="off"/>
                    </div>
                    <div class="col-md-4">
                        <label for="txEstado">Estado</label>
                        <select class="form-control" id="selEstado" name="selEstado" placeholder="Selecione">
                            <option value="">Selecione</option>
                            @foreach($estados as $estado)
                                <option value="{{$estado->id}}">{{$estado->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="txCidade">Cidade</label>
                        <input type="text" class="form-control" id="txCidade" name="txCidade" placeholder="Cidade" autocomplete="off"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Adicionar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>