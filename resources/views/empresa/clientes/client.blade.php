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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txNome">Nome</label>
                                <input type="text" class="form-control" id="txNome" name="txNome" placeholder="Nome" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txEmail">Email</label>
                                <input type="email" class="form-control" id="txEmail" name="txEmail" placeholder="Email" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="selTipoPessoa">Tipo</label>
                                <select id="selTipoPessoa" name="selTipoPessoa" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="F">Física</option>
                                    <option value="J">Jurírica</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="psSenha">CPF</label>
                                <input type="text" class="form-control" id="txDocumento" name="txDocumento" placeholder="Documento" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txRg">RG</label>
                                <input type="text" class="form-control" id="txRg" name="txRg" placeholder="RG"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txNascimento">Nascimento</label>
                                <input type="date" class="form-control" id="txNascimento" name="txNascimento" placeholder="Nascimento"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="selSexo">Sexo</label>
                                <select id="selSexo" name="selSexo" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
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
                        <div class="col-md-12">
                            <div class="box-body table-responsive no-padding">
                                <table id="tblEnderecos" class="table table-bordered table-hover">
                                    <tr><th colspan="8" style="text-align: center">Endereços</th></tr>
                                    <tr><th>Cep</th><th>Endereço</th><th>Número</th><th>Complemento</th><th>Bairro</th><th>Cidade</th><th>Estado</th><th></th></tr>
                                </table>
                            </div>
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
                                <tr><th colspan="4" style="text-align: center">Telefones</th></tr>
                                <tr><th>DDD</th><th>Número</th><th>Ramal</th><th></th></tr>
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