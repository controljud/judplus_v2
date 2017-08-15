<?php

namespace App\Http\Controllers\empresa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\UserType;

class UserController extends Controller
{

    public function index(Request $request){
        $users = Users::select('users.name', 'users.email', 'users.created_at', 'users.id_tipo_usuario as id_tipo', 'tipo_usuario.tipo as tipo_usuario')
            ->join('tipo_usuario', 'tipo_usuario.id', 'users.id_tipo_usuario')
            ->where('users.id_empresa', $this->empresa->id)
            ->orderBy('users.name')->paginate(15);

        $dados = [
            'empresa' => $this->empresa,
            'user' => $request->session()->get('_user'),
            'usuarios' => $users,
        ];

        return view('empresa.usuarios.users', $dados);
    }

    public function getCreate(Request $request){
        $tipos = UserType::all();
        $dados = [
            'empresa' => $this->empresa,
            'user' => $request->session()->get('_user'),
            'action' => 'novo',
            'tipos' => $tipos,
        ];

        return view('empresa.usuarios.user', $dados);
    }

    public function postCreate(Request $request){
        $nome = $request->input('txNome');
        $email = $request->input('txEmail');
        $senha = $request->input('psSenha');
        $tipo = $request->input('selTipo');

        $user = new Users;
        $user->name = $nome;
        $user->email = $email;
        $user->password = md5($senha);
        $user->id_tipo_usuario = $tipo;
        $user->id_empresa = $this->empresa->id;

        $user->save();

        return $this->index($request);
    }

}
