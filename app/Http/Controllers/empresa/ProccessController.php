<?php

namespace App\Http\Controllers\empresa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proccess;

class ProccessController extends Controller
{
    public function getDatatable(){
        $empresa = \Session::get('_empresa');
        $clients = Proccess::select('processos.*')
            ->join('empresa', 'empresa.id', 'clientes.id_empresa')
            ->where('empresa.link', $empresa->link)->get();

        return DataTables::of($clients)->make(true);
    }

    public function listar_todos()
    {
        return $this->getDatatable();
    }

    public function index(Request $request){
        $empresa = \Session::get('_empresa');
        $dados = [
            'empresa' => $empresa,
            'user' => $request->session()->get('_user'),
        ];

        return view('empresa.processos.index', $dados);
    }
}
