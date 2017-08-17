@extends('empresa.template')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{$empresa->name}}<small>Clientes</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Clientes</li>
            <li class="active">Novo</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <form method="post" action="/{{$empresa->link}}/clientes/novo">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txNome">Nome</label>
                                <input type="text" class="form-control" id="txNome" name="txNome" placeholder="Nome" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txEmail">Email</label>
                                <input type="email" class="form-control" id="txEmail" name="txEmail" placeholder="Email" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="psSenha">CPF/CNPJ</label>
                                <input type="password" class="form-control" id="psSenha" name="psSenha" placeholder="Senha" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Endereço</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
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
                                    <label for="txCidade">Cidade</label>
                                    <input type="text" class="form-control" id="txCidade" name="txCidade" placeholder="Cidade" autocomplete="off"/>
                                </div>
                                <div class="col-md-4">
                                    <label for="txEstado">Estado</label>
                                    <input type="text" class="form-control" id="txEstado" name="txEstado" placeholder="Estado" autocomplete="off"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="btn btn-success btn-sm" title="Adicionar endereço" id="btAddEndereço"><i class="fa fa-plus-circle"></i></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="dvEnderecos" style="margin-top:30px;">
                                <div class="box box-primary boxEndereco" id="1">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Rua dos Anciões, 32</h4>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" title="Remover endereço"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-primary boxEndereco" id="2">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Rua das Margaridas, 542, 2º Andar</h4>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" title="Remover endereço"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Telefone</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="txDDD">DDD</label>
                                    <input type="text" class="form-control" id="txDDD" name="txDDD" placeholder="DDD" autocomplete="off"/>
                                </div>
                                <div class="col-md-3">
                                    <label for="txNumero">Número</label>
                                    <input type="text" class="form-control" id="txNumero" name="txNumero" placeholder="Número" autocomplete="off"/>
                                </div>
                                <div class="col-md-3">
                                    <label for="txRamal">Ramal</label>
                                    <input type="text" class="form-control" id="txRamal" name="txRamal" placeholder="Ramal" autocomplete="off"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="btn btn-success btn-sm" title="Adicionar telefone" id="btAddPhone"><i class="fa fa-plus-circle"></i></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dvTelefones" style="margin-top:30px;">
                                <div class="box box-primary boxTelefone" id="1">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">(21) 3455-4654</h4>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" title="Remover telefone"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-primary boxTelefone" id="2">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">(21) 98845-5455</h4>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" title="Remover telefone"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/><br/>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success btn-sm" value="Salvar"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop