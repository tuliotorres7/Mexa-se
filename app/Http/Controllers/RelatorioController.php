<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ClienteCreateRequest;
use App\Http\Requests\ClienteUpdateRequest;
use App\Repositories\ClienteRepository;
use App\Validators\ClienteValidator;
use App\Services\ClienteService;
use App\Repositories\UserRepository;
use App\Cliente;
use App\Users;
/**
     * Display the specified resource.
     *
     * ESSA CLASSE FOI CRIADA COMO COPIA IDENTICA DE ClientesController
     * PODE HAVER BASTANTE COISA ESTRANHA AQUI
     * 
     */

/**
 * Class ClientesController.
 *
 * @package namespace App\Http\Controllers;
 */
class RelatorioController extends Controller
{
   
    protected $repository;
    protected $validator;
    protected $service;
    /**
     * ClientesController constructor.
     *
     * @param ClienteRepository $repository
     * @param ClienteValidator $validator
     */
    public function __construct(ClienteRepository $repository, ClienteValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
     
    }
public function application(){
    return view('relatorio.application');
}
}
