<?php

namespace App\Http\Controllers\empresa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Customer;

class CompanyController extends Controller
{

    public function index(Request $request){
        //Quantidade de usuários
        $user = \Session::get('_user');
        $empresa = \Session::get('_empresa');

        $qtUser = Users::where('id_empresa', $empresa->id)->count();
        $qtClient = Customer::where('id_empresa', $empresa->id)->count();
        $user->image = $user->image != null ? $user->image : '/image/user.jpg';

        $dadosPagina = [
            'empresa' => $empresa,
            'user' => $user,
            'qt_user' => $qtUser,
            'qt_client' => $qtClient,
        ];
        return view('empresa.home', $dadosPagina);
    }

}
