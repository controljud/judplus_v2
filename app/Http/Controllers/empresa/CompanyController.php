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
        $qtUser = Users::where('id_empresa', $this->empresa->id)->count();
        $qtClient = Customer::where('id_empresa', $this->empresa->id)->count();
        $user = $request->session()->get('_user');
        $user->image = $user->image != null ? $user->image : '/image/user.jpg';

        $dadosPagina = [
            'empresa' => $this->empresa,
            'user' => $user,
            'qt_user' => $qtUser,
            'qt_client' => $qtClient,
        ];
        return view('empresa.home', $dadosPagina);
    }

}
