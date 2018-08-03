@extends('empresa.template')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{$empresa->name}}<small>Usuário</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Usuários</a></li>
            <li>Usuários</li>
            <li class="active">Novo</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <form method="post" action="{{env('APP_URL')}}/{{$empresa->link}}/usuarios/editar" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_id" value="{{isset($usuario->id) ? $usuario->id : 0}}" />
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="javascript:history.back()" class="btn btn-default btn-sm">Voltar</a>
                        </div>
                        <div class="col-md-6" style="text-align:right">
                            <input type="submit" class="btn btn-success btn-sm" value="Salvar"/>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4" style="text-align: center">
                            <label for="flUser">
                                <img id="imgUsr" class="profile-user-img img-responsive img-circle" src="@if(isset($usuario->image) && $usuario->image != '') {{env('APP_URL')."/image/users/".$empresa->link.'/'.$usuario->image}} @else {{env('APP_URL')."/image/user.jpg"}} @endif" alt="User profile picture">
                                <input type="file" name="flUser" id="flUser" style="display:none"/>
                                <h3>{{isset($usuario->name) ? $usuario->name : ''}}</h3>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="txNome">Nome</label>
                                        <input type="text" class="form-control" id="txNome" name="txNome" placeholder="Nome" autocomplete="off" value="{{isset($usuario->name) ? $usuario->name : ''}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="txEmail">Email</label>
                                        <input type="email" class="form-control" id="txEmail" name="txEmail" placeholder="Email" autocomplete="off" value="{{isset($usuario->email) ? $usuario->email : ''}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="psSenha">Senha</label>
                                        <input type="password" class="form-control" id="psSenha" name="psSenha" placeholder="Senha" value="{{isset($usuario->senha) ? $usuario->senha : ''}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="psCSenha">Confirme a senha</label>
                                        <input type="password" class="form-control" id="psCSenha" placeholder="Confirme a senha" value="{{isset($usuario->senha) ? $usuario->senha : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="selTipo">Tipo de Usuário</label>
                                        <select id="selTipo" name="selTipo" class="form-control" required>
                                            <option value="">Selecione</option>
                                            @foreach($tipos as $tipo)
                                                <option value="{{$tipo->id}}" @if(isset($usuario->id_tipo_usuario) && $usuario->id_tipo_usuario == $tipo->id) {{"selected"}} @endif>{{$tipo->tipo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="javascript:history.back()" class="btn btn-default btn-sm">Voltar</a>
                        </div>
                        <div class="col-md-6" style="text-align:right">
                            <input type="submit" class="btn btn-success btn-sm" value="Salvar"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop