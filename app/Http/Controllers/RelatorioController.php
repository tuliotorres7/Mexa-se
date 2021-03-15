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
use App\Entities\Cliente;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
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
    public function __construct(ClienteRepository $repository, ClienteValidator $validator, ClienteService $service,UserRepository $userRepository)
    {
        $this->userRepository = $userRepository->orderBy('nome','asc');
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = $this->repository->all();
        $user_list = $this->userRepository->selectBoxList();
        $posts = null;
        return view('relatorio.relatorio', [
            'clientes' => $clientes,
            'user_list' => $user_list,
           
        ]);
    }

    public function store(ClienteCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $cliente = $request['success'] ? $request['data']: null;

        session()->flash('success',[
            'success'   => $request['success'],
            'messages'  => $request['messages']
        ]);
        
        return redirect()->route('relatorio.relatorio');
    }


    public function searchInstrutor(Request $request, Cliente $relatorio){
        $user_list = $this->userRepository->selectBoxList();       
        $dataForm = $request->all();
        //$posts = $this->repository->findByField('user_id',$dataForm['user_id']);
        $posts = $this->repository->scopeQuery(function($query){
            return $query->orderBy('nome','asc');
          
        })->findByField('user_id',$dataForm['user_id']);
        //$posts = $posts-> orderBy('nome','asc');
        //dd($posts);
        return view('relatorio.relatorio', [
            'clientes'=> $posts,
            'user_list' => $user_list,
        ]);
    }
    
    public function show($id)
    {
        $cliente = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $cliente,
            ]);
        }

        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = $this->repository->find($id);

        return view('clientes.edit', compact('cliente'));
    }

    public function update(ClienteUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $cliente = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Cliente updated.',
                'data'    => $cliente->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Cliente deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Cliente deleted.');
    }
}
