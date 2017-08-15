<?php

namespace App\Http\Controllers\empresa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function index(Request $request){
        $dados = [
            'empresa' => $this->empresa,
            'user' => $request->session()->get('_user'),
        ];

        return view('empresa.agenda.calendar', $dados);
    }
}
