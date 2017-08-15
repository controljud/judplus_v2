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
        <div class="quest-actions">
            <a href="/{{$empresa->link}}/clientes/novo" class="btn btn-success">Novo</a>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Clientes cadastrados em {{$empresa->name}}</h3>
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
                            <div class="btn btn-xs btn-default">Processos</div>
                            <div class="btn btn-xs btn-primary">Editar</div>
                            <div class="btn btn-xs btn-danger">Excluir</div>
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