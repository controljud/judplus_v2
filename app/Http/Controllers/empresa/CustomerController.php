<?php

namespace App\Http\Controllers\empresa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(Request $request){
        $clients = Customer::where('id_empresa', $this->empresa->id)
            ->orderBy('name')->paginate(15);

        $dados = [
            'empresa' => $this->empresa,
            'user' => $request->session()->get('_user'),
            'clients' => $clients ? $clients : array(),
        ];

        return view('empresa.clientes.clients', $dados);
    }

    public function getCreate(Request $request){
        $dados = [
            'empresa' => $this->empresa,
            'user' => $request->session()->get('_user'),
        ];

        return view('empresa.clientes.client', $dados);
    }
}
