@extends('empresa.template')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{$empresa->name}}<small>Clientes</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Clientes</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Clientes cadastrados em {{$empresa->name}}</h3>
                <div class="box-tools">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="/{{$empresa->link}}/clientes/novo" class="btn btn-sm btn-success">Novo</a>
                        </div>
                        <div class="col-md-10">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Documento</th>
                        <th>Tipo</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->cpf_cnpj}}</td>
                        <td>
                            @if(strlen($client->cpf_cnpj) < 14)
                                Pessoa física
                            @else
                                Pessoa Jurídica
                            @endif
                        </td>
                        <td>
                            <a href="/{{$empresa->link}}/clientes/processos/{{$client->id}}" class="btn btn-xs btn-default">Processos</a>
                            <a href="/{{$empresa->link}}/clientes/editar/{{$client->id}}" class="btn btn-xs btn-primary">Editar</a>
                            <a href="/{{$empresa->link}}/clientes/excluir{{$client->id}}" class="btn btn-xs btn-danger">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$clients->links()}}
            </div>
            <!-- /.box-body -->
        </div>
    </section>
@stop