<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage(){
        $pathTitle = 'path';
        return view('welcome',['title' => $pathTitle]);
    }

    public function cadastrar(){
        echo "cadastrar";
    }
/**
 * metodo para login de usuario VIEW
 */
    public function fazerLogin(){
        return view('user.login');
    }

    public function relatorio(){
        return view('outras.relatorio');
    }
}
