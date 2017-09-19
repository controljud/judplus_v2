<?php

namespace App\Http\Controllers\empresa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use DB;

class CustomerController extends Controller
{
    public function index(Request $request){
        $clients = Customer::where('id_empresa', $this->empresa->id)
            ->orderBy('nome')->paginate(15);

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
            'estados' => DB::table('uf')->get(),
        ];

        return view('empresa.clientes.client', $dados);
    }

    public function postCreate(Request $request){

    }

    public function getEdit(Request $request){
        $segments = $request->segments();
        $id_cliente = $segments[3];
        $cliente = Customer::where('id', $id_cliente)->where('id_empresa', $this->empresa->id)->first();
        $enderecos = DB::table('endereco')
            ->select('endereco.cep', 'endereco.endereco', 'endereco.numero', 'endereco.complemento', 'endereco.bairro', 'cidade.cidade', 'uf.sigla as estado')
            ->join('cidade', 'cidade.id', 'endereco.cidade')
            ->join('uf', 'uf.id', 'endereco.id_uf')
            ->where('id_cliente', $id_cliente)->get();
        $dados = [
            'empresa' => $this->empresa,
            'user' => $request->session()->get('_user'),
            'estados' => DB::table('uf')->get(),
            'cliente' => $cliente,
            'enderecos' => $enderecos,
            'telefones' => DB::table('telefone')->where('id_cliente', $id_cliente)->get(),
        ];

        return view('empresa.clientes.edit', $dados);
    }

    public function postEdit(Request $request){

    }
}
