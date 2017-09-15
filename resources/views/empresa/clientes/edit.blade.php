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
            <form method="post" action="/{{$empresa->link}}/clientes/editar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txNome">Nome</label>
                                <input type="text" class="form-control" id="txNome" name="txNome" placeholder="Nome" autocomplete="off" value="{{$cliente->name}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txEmail">Email</label>
                                <input type="email" class="form-control" id="txEmail" name="txEmail" placeholder="Email" autocomplete="off" value="{{$cliente->email}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="psSenha">CPF/CNPJ</label>
                                <input type="text" class="form-control" id="txDocumento" name="txDocumento" placeholder="Senha" autocomplete="off" value="{{$cliente->cpf_cnpj}}">
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="dvAddEndereco" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-endereco">Adicionar Endereço</div>
                        </div>
                    </div>
                    @include('empresa.clientes.modalendereco')
                    <div class="row">
                        <div class="col-md-10">
                            <table id="tblEnderecos" class="table table-bordered">
                                <tr><th colspan="8" style="text-align: center">Endereços</th></tr>
                                <tr><th>Cep</th><th>Endereço</th><th>Número</th><th>Complemento</th><th>Bairro</th><th>Cidade</th><th>Estado</th><th></th></tr>
                                @foreach($enderecos as $endereco)
                                <tr>
                                    <td>{{$endereco->cep}}</td>
                                    <td>{{$endereco->endereco}}</td>
                                    <td>{{$endereco->numero}}</td>
                                    <td>{{$endereco->complemento}}</td>
                                    <td>{{$endereco->bairro}}</td>
                                    <td>{{$endereco->cidade}}</td>
                                    <td>{{$endereco->estado}}</td>
                                    <td><a href="#" class="btn btn-sm btn-danger">Excluir</a></td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="dvAddTelefone" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-telefone">Adicionar Telefone</div>
                        </div>
                    </div>
                    @include('empresa.clientes.modaltelefone')
                    <div class="row">
                        <div class="col-md-6">
                            <table id="tblTelefones" class="table table-bordered">
                                <tr><th colspan="3">Telefones</th></tr>
                                <tr><th>DDD</th><th>Número</th><th>Ramal</th></tr>
                                @foreach($telefones as $telefone)
                                <tr>
                                    <td>{{$telefone->ddd}}</td>
                                    <td>{{$telefone->numero}}</td>
                                    <td>{{$telefone->ramal}}</td>
                                </tr>
                                @endforeach
                            </table>
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