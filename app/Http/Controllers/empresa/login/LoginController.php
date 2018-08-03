<?php

namespace App\Http\Controllers\empresa\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Company;
use DB;

class LoginController extends Controller
{
    public function __construct(Request $request){
    }

    public function getLogin(Request $request){
        $empresa = $this->getEmpresa($request);
        return view('login.login', ["empresa" => \Session::get('_empresa')]);
    }

    public function getEmpresa(Request $request){
        if(!\Session::has('_empresa')) {
            $segments = $request->segments();
            if (isset($segments[0])) {
                if ($empresa = Company::where('link', $segments[0])->first()) {
                    \Session::put('_empresa', $empresa);
                    return $empresa;
                }
            }
        }else{
            return \Session::get('_empresa');
        }
    }

    public function postLogin(Request $request){
        $empresa = $this->getEmpresa($request);
        $email = $request->input('email');
        $senha = md5($request->input('senha'));

        $user = Users::select('users.id', 'users.name', 'users.email', 'users.image', 'users.created_at', 'tipo_usuario.id as id_tipo', 'tipo_usuario.tipo')
            ->where('email', $email)
            ->join('tipo_usuario', 'tipo_usuario.id', 'users.id_tipo_usuario')
            ->where('password', $senha)
            ->where('deleted_at', null)
            ->where('id_empresa', $empresa->id)->first();

        if(isset($user)){
            \Session::put('_id', $user->id);
            \Session::put('_user', $user);
            \Session::put('_empresa_link', $empresa->link);

            return redirect(url('/'.$empresa->link));
        }else{
            //return redirect(url('/'.$empresa->link.'/login'));
        }
    }

    public function getLogout(Request $request){
        $empresa = $this->getEmpresa($request);
        \Session::forget('_id');
        \Session::forget('_user');
        \Session::forget('_empresa');
        \Session::forget('_empresa_link');

        return redirect(url('/'.$empresa->link.'/login'));
    }
}
