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
        <div class="quest-actions">
            <a href="/{{$empresa->link}}/usuarios/novo" class="btn btn-success">Novo</a>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Usuarios cadastrados em {{$empresa->name}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
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
                            <div class="btn btn-xs btn-primary">Editar</div>
                            <div class="btn btn-xs btn-danger">Excluir</div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $usuarios->links() }}
            </div>
            <!-- /.box-body -->
        </div>
    </section>
@stop