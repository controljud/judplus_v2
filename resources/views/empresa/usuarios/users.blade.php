@extends('empresa.template')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{$empresa->name}}<small>Usuários</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Usuários</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Usuarios cadastrados em {{$empresa->name}}</h3>
                <div class="box-tools">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="/{{$empresa->link}}/usuarios/novo" class="btn btn-sm btn-success">Novo</a>
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
            <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Tipo de usuário</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>
                            @if($usuario->id_tipo >= 3)
                                <?php $tpLbl = 'label-primary'; ?>
                            @elseif($usuario->it_tipo == 2)
                                <?php $tpLbl = 'label-warning'; ?>
                            @else
                                <?php $tpLbl = 'label-default'; ?>
                            @endif
                            <span class="label {{$tpLbl}}">
                                {{$usuario->tipo_usuario}}
                            </span>
                        </td>
                        <td>
                            <div class="btn btn-xs btn-default viewUsr" id="{{$usuario->id}}" data-toggle="modal" data-target="#modal-view-usuario" data-company="{{$empresa->link}}">Visualizar</div>
                            <a href="/{{$empresa->link}}/usuarios/editar/{{$usuario->id}}" class="btn btn-xs btn-primary">Editar</a>
                            <a href="/{{$empresa->link}}/usuarios/excluir{{$usuario->id}}" class="btn btn-xs btn-danger">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $usuarios->links() }}
            </div>
            @include('empresa.usuarios.modalview')
            <!-- /.box-body -->
        </div>
    </section>
@stop