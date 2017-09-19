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
            <form method="post" action="/{{$empresa->link}}/usuarios/editar/{{$usuario->id}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4" style="text-align: center">
                            <label for="flUser">
                                <img id="imgUsr" class="profile-user-img img-responsive img-circle" src=@if($usuario->image != '') {{"/image/users/".$empresa->link.'/'.$usuario->image}} @else {{"/image/user.jpg"}} @endif alt="User profile picture">
                                <input type="file" name="flUser" id="flUser" style="display:none"/>
                                <h3>{{$usuario->name}}</h3>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="txNome">Nome</label>
                                        <input type="text" class="form-control" id="txNome" name="txNome" placeholder="Nome" autocomplete="off" value="{{$usuario->name}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="txEmail">Email</label>
                                        <input type="email" class="form-control" id="txEmail" name="txEmail" placeholder="Email" autocomplete="off" value="{{$usuario->email}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="psSenha">Senha</label>
                                        <input type="password" class="form-control" id="psSenha" name="psSenha" placeholder="Senha" value="{{$usuario->senha}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="psCSenha">Confirme a senha</label>
                                        <input type="password" class="form-control" id="psCSenha" placeholder="Confirme a senha" value="{{$usuario->senha}}">
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
                                                <option value="{{$tipo->id}}" @if($usuario->id_tipo_usuario == $tipo->id) {{"selected"}} @endif>{{$tipo->tipo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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