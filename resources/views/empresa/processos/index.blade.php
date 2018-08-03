@extends('empresa.template')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{$empresa->name}}<small>Processos</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Processos</a></li>
            <li class="active">Processos</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Processos cadastrados em {{$empresa->name}}</h3>
                <div class="box-tools">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{env('APP_URL')}}/{{$empresa->link}}/processos/editar" class="btn btn-sm btn-success">Novo</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body table-responsive no-padding" style="margin:10px; border: 0">
                        <table id="tbl_processos" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Número</th>
                                <th>Cliente</th>
                                <th>Réu</th>
                                <th>Criado em</th>
                                <th>Atualização</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Número</th>
                                <th>Cliente</th>
                                <th>Réu</th>
                                <th>Criado em</th>
                                <th>Atualização</th>
                                <th>Ação</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts.footer')
    <script src="{{env('APP_URL')}}/js/proccess/index.js"></script>
@endsection