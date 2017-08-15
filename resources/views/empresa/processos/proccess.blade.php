@extends('empresa.template')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{$empresa->name}}<small>Processos</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Usuários</a></li>
            <li class="active">Usuários</li>
        </ol>
    </section>
@stop