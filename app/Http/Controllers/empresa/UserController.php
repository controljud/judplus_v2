<?php

namespace App\Http\Controllers\empresa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\UserType;

class UserController extends Controller
{

    public function index(Request $request){
        $users = Users::select('users.id', 'users.name', 'users.email', 'users.created_at', 'users.id_tipo_usuario as id_tipo', 'tipo_usuario.tipo as tipo_usuario')
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
        $name_image = null;

        if($request->file('flUser')->isValid()){
            $file = $request->file('flUser');
            $ext = $file->getClientOriginalExtension();

            $name_image = md5(rand(0, 10000).$nome.time()).'.'.$ext;

            $file->move('image/users', $name_image);
        }

        $user = new Users;
        $user->name = $nome;
        $user->email = $email;
        $user->password = md5($senha);
        $user->id_tipo_usuario = $tipo;
        $user->id_empresa = $this->empresa->id;
        $user->image = $name_image;

        $user->save();

        return $this->index($request);
    }

    public function getEdit(Request $request){
        $segments = $request->segments();
        $id_usr = $segments[3];

        $usuario = Users::where('id', $id_usr)->where('id_empresa', $this->empresa->id)->first();

        $tipos = UserType::all();
        $dados = [
            'empresa' => $this->empresa,
            'user' => $request->session()->get('_user'),
            'action' => 'novo',
            'tipos' => $tipos,
            'usuario' => $usuario,
        ];

        return view('empresa.usuarios.edit', $dados);
    }

    public function postEdit(Request $request){
        $segments = $request->segments();
        $id_user = $segments[3];
        $nome = $request->input('txNome');
        $email = $request->input('txEmail');
        $senha = $request->input('psSenha');
        $tipo = $request->input('selTipo');
        $name_image = null;

        if($request->file('flUser')->isValid()){
            $file = $request->file('flUser');
            $ext = $file->getClientOriginalExtension();

            $name_image = md5(rand(0, 10000).$nome.time()).'.'.$ext;

            $file->move('image/users/'.$this->empresa->link.'/', $name_image);
        }

        $user = Users::where('id', $id_user)->first();
        $user->name = $nome;
        $user->email = $email;
        $user->password = $senha != '' ? md5($senha) : $user->password;
        $user->id_tipo_usuario = $tipo;
        $user->id_empresa = $this->empresa->id;
        $user->image = $name_image;

        $user->save();

        return $this->index($request);
    }

    public function ajaxView(Request $request){
        $id_usr = $request->input('id_usr');
        if($user = Users::select('users.name', 'users.email', 'users.image', 'tipo_usuario.tipo')
            ->join('tipo_usuario', 'tipo_usuario.id', 'users.id_tipo_usuario')
            ->where('users.id', $id_usr)
            ->where('id_empresa', $this->empresa->id)->first()){
            return json_encode($user);
        }else{
            return '';
        }
    }

}
