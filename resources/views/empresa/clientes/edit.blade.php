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
            <form method="post" action="{{env('APP_URL')}}/{{$empresa->link}}/clientes/editar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_id" value="{{isset($cliente->id) ? $cliente->id : 0}}" />
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txNome">Nome*</label>
                                <input type="text" class="form-control" id="txNome" name="txNome" placeholder="Nome" autocomplete="off" value="{{isset($cliente->nome) ? $cliente->nome : ''}}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txEmail">Email*</label>
                                <input type="email" class="form-control" id="txEmail" name="txEmail" placeholder="Email" autocomplete="off" value="{{isset($cliente->email) ? $cliente->email : ''}}" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="selTipoPessoa">Tipo de pessoa*</label>
                                <select id="selTipoPessoa" name="selTipoPessoa" class="form-control" placeholder="Selecione" required>
                                    <option value="F" {{isset($cliente->tipo_pessoa) && $cliente->tipo_pessoa == 'F' ? 'selected' : ''}}>Pessoa Física</option>
                                    <option value="J" {{isset($cliente->tipo_pessoa) && $cliente->tipo_pessoa == 'J' ? 'selected' : ''}}>Pessoa Jurídica</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txDocumento">CPF/CNPJ*</label>
                                <input type="text" class="form-control" id="txDocumento" name="txDocumento" placeholder="Documento" autocomplete="off" value="{{isset($cliente->documento) ? $cliente->documento : ''}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="selSexo">Sexo</label>
                                <select id="selSexo" name="selSexo" class="form-control" placeholder="Selecione">
                                    <option value="F" {{isset($cliente->sexo) && $cliente->sexo == 'F' ? 'selected' : ''}}>Feminino</option>
                                    <option value="M" {{isset($cliente->sexo) && $cliente->sexo == 'M' ? 'selected' : ''}}>Masculino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txNascimento">Nascimento</label>
                                <input type="date" id="txNascimento" name="txNascimento" class="form-control" placeholder="Nascimento" value="{{isset($cliente->nascimento) ? $cliente->nascimento : ''}}"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txRG">RG</label>
                                <input type="text" id="txRG" name="txRG" class="form-control" placeholder="RG" value="{{isset($cliente->rg) ? $cliente->rg : ''}}"/>
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
                                <?php $x = 0; ?>
                                @foreach($enderecos as $endereco)
                                <tr>
                                    <td><input type="hidden" name="endereco[{{$x}}][cep]" value="{{$endereco->cep}}"/>{{$endereco->cep}}</td>
                                    <td><input type="hidden" name="endereco[{{$x}}][endereco]" value="{{$endereco->endereco}}"/>{{$endereco->endereco}}</td>
                                    <td><input type="hidden" name="endereco[{{$x}}][numero]" value="{{$endereco->numero}}"/>{{$endereco->numero}}</td>
                                    <td><input type="hidden" name="endereco[{{$x}}][complemento]" value="{{$endereco->complemento}}"/>{{$endereco->complemento}}</td>
                                    <td><input type="hidden" name="endereco[{{$x}}][bairro]" value="{{$endereco->bairro}}"/>{{$endereco->bairro}}</td>
                                    <td><input type="hidden" name="endereco[{{$x}}][cidade]" value="{{$endereco->cidade}}"/>{{$endereco->cidade}}</td>
                                    <td><input type="hidden" name="endereco[{{$x}}][estado]" value="{{$endereco->estado}}"/>{{$endereco->estado}}</td>
                                    <td><div class="removeDado"><i class="fa fa-minus-circle text-red m-cursor"></i></div></td>
                                </tr>
                                <?php $x++; ?>
                                <script>numEndereco++</script>
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
                                <?php $x = 0; ?>
                                @foreach($telefones as $telefone)
                                <tr>
                                    <td><input type="hidden" name="telefone[{{$x}}][ddd]" value="{{$telefone->ddd}}"/>{{$telefone->ddd}}</td>
                                    <td><input type="hidden" name="telefone[{{$x}}][numero]" value="{{$telefone->numero}}"/>{{$telefone->numero}}</td>
                                    <td><input type="hidden" name="telefone[{{$x}}][ramal]" value="{{$telefone->ramal}}"/>{{$telefone->ramal}}</td>
                                    <td><div class="removeDado"><i class="fa fa-minus-circle text-red m-cursor"></i></div></td>
                                </tr>
                                <?php $x++; ?>
                                <script>numTelefone++</script>
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