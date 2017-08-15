<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Company;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $empresa = null;
    public $dados;

    public function __construct(Request $request){
        $this->getEmpresa($request);
    }

    public function getEmpresa(Request $request){
        $segments = $request->segments();
        if(isset($segments[0])){
            if($empresa = Company::where('link', $segments[0])->first()){
                $this->empresa = $empresa;
            }
        }
    }

}
