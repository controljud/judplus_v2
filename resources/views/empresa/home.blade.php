@extends('empresa.template')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>{{$empresa->name}}<small>Página inicial</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$qt_client}}</h3>
                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="{{env('APP_URL')}}/{{$empresa->link}}/clientes" class="small-box-footer">Visualizar <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>153</h3>
                    <p>Processos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{env('APP_URL')}}/{{$empresa->link}}/processos" class="small-box-footer">Visualizar <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>
                    <p>Prazos em aberto</p>
                </div>
                <div class="icon">
                    <i class="ion ion-calendar"></i>
                </div>
                <a href="{{env('APP_URL')}}/{{$empresa->link}}/agenda" class="small-box-footer">Visualizar <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @if($user->id_tipo >= 3)
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$qt_user}}</h3>
                    <p>Uusários</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                </div>
                <a href="{{env('APP_URL')}}/{{$empresa->link}}/usuarios" class="small-box-footer">Visualizar <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- /.content -->
@stop