<?php

namespace App\Http\Controllers\empresa;

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Address;
use App\Models\State;
use App\Models\City;
use App\Models\Phone;
use Yajra\DataTables\Facades\DataTables;
use DB;

class CustomerController extends Controller
{
    public function getDatatable(){
        $clients = Customer::join('empresa', 'empresa.id', 'clientes.id_empresa')->where('empresa.link', session('_empresa'))->get();

        return DataTables::of($clients)->make(true);
    }

    public function listar_todos()
    {
        return $this->getDatatable();
    }

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

    public function getEdit(Request $request){
        $segments = $request->segments();
        $id_cliente = isset($segments[3]) ? $segments[3] : 0;
        $enderecos = [];
        $telefones = [];

        if($cliente = Customer::where('id', $id_cliente)->where('id_empresa', $this->empresa->id)->first()) {
            $enderecos = Address::select('endereco.cep', 'endereco.endereco', 'endereco.numero', 'endereco.complemento', 'endereco.bairro', 'cidade.cidade', 'uf.sigla as estado')
                ->join('cidade', 'cidade.id', 'endereco.cidade')
                ->join('uf', 'uf.id', 'endereco.id_uf')
                ->where('id_cliente', $id_cliente)->get();
            $telefones = Phone::where('id_cliente', $id_cliente)->get();
        }

        $dados = [
            'empresa' => $this->empresa,
            'user' => $request->session()->get('_user'),
            'estados' => DB::table('uf')->get(),
            'cliente' => $cliente,
            'enderecos' => $enderecos,
            'telefones' => $telefones,
        ];

        return view('empresa.clientes.edit', $dados);
    }

    public function postEdit(Request $request){
        $data = Input::all();

        $cliente = Customer::findOrNew($data['_id']);
        $cliente->nome = $data['txNome'];
        $cliente->email = $data['txEmail'];
        $cliente->tipo_pessoa = $data['selTipoPessoa'];
        $cliente->documento = $data['txDocumento'];
        $cliente->sexo = $data['selSexo'];
        $cliente->nascimento = $data['txNascimento'];
        $cliente->rg = $data['txRG'];
        $cliente->image = '';

        $cliente->id_empresa = $this->empresa->id;

        $cliente->save();

        $enderecos = isset($data['endereco']) ? $data['endereco'] : [];
        $telefones = isset($data['telefone']) ? $data['telefone'] : [];

        Address::where('id_cliente', $cliente->id)->delete();
        foreach($enderecos as $endereco){
            $address = new Address;
            $address->id_cliente = $cliente->id;
            $address->cep = str_replace('-', '', $endereco['cep']);
            $address->endereco = $endereco['endereco'];
            $address->numero = $endereco['numero'];
            $address->complemento = $endereco['complemento'];
            $address->bairro = $endereco['bairro'];

            //Estado
            $uf = State::select('id')->where('sigla', $endereco['estado'])->first();
            $address->id_uf = $uf->id;

            //Cidade
            $cidade = City::select('id')->where('cidade', $endereco['cidade'])->where('id_uf', $uf->id)->first();
            $address->cidade = $cidade->id;
            $address->id_pais = 1;

            $address->save();
        }

        Phone::where('id_cliente', $cliente->id)->delete();
        foreach($telefones as $telefone){
            $phone = new Phone;
            $phone->ddd = $telefone['ddd'];
            $phone->numero = $telefone['numero'];
            $phone->ramal = $telefone['ramal'];
            $phone->id_cliente = $cliente->id;

            $phone->save();
        }

        return $this->index($request);
    }
}
