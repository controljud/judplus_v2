<?php

namespace App\Http\Controllers\empresa\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use DB;

class LoginController extends Controller
{
    public function getLogin(){
        return view('login.login', ["empresa" => $this->empresa]);
    }

    public function postLogin(Request $request){
        $email = $request->input('email');
        $senha = md5($request->input('senha'));

        $user = Users::select('users.id', 'users.name', 'users.email', 'users.image', 'users.created_at', 'tipo_usuario.id as id_tipo', 'tipo_usuario.tipo')
            ->where('email', $email)
            ->join('tipo_usuario', 'tipo_usuario.id', 'users.id_tipo_usuario')
            ->where('password', $senha)
            ->where('deleted_at', null)
            ->where('id_empresa', $this->empresa->id)->first();

        if(isset($user)){
            $request->session()->put('_id', $user->id);
            $request->session()->put('_user', $user);
            $request->session()->put('_empresa', $this->empresa->link);

            return redirect(url('/'.$this->empresa->link));
        }else{
            return redirect(url('/'.$this->empresa->link.'/login'));
        }
    }

    public function getLogout(Request $request){
        $request->session()->forget('_id');
        $request->session()->forget('_user');
        $request->session()->forget('_empresa');

        return redirect(url('/'.$this->empresa->link.'/login'));
    }
}
