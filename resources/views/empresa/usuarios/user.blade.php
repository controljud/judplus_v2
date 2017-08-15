@extends('empresa.template')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{$empresa->name}}<small>Usuário</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Usuários</a></li>
            <li class="active">Usuários</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <form method="post" action="/{{$empresa->link}}/usuarios/novo">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="profile-user-img img-responsive img-circle" src="/image/user.jpg" alt="User profile picture">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="txNome">Nome</label>
                                        <input type="text" class="form-control" id="txNome" name="txNome" placeholder="Nome">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="txEmail">Email</label>
                                        <input type="email" class="form-control" id="txEmail" name="txEmail" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="psSenha">Senha</label>
                                        <input type="password" class="form-control" id="psSenha" name="psSenha" placeholder="Senha">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="psCSenha">Confirme a senha</label>
                                        <input type="password" class="form-control" id="psCSenha" placeholder="Confirme a senha">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="selTipo">Tipo de Usuário</label>
                                        <select id="selTipo" name="selTipo" class="form-control">
                                            <option value="">Selecione</option>
                                            @foreach($tipos as $tipo)
                                            <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
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