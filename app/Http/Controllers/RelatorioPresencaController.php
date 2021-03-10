<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PresencaCreateRequest;
use App\Http\Requests\PresencaUpdateRequest;
use App\Repositories\PresencaRepository;
use App\Validators\PresencaValidator;
use App\Services\PresencaService;
use App\Repositories\UserRepository;

use App\Repositories\ClienteRepository;
use App\Entities\Presenca;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Auth;

/**
     * Display the specified resource.
     *
     * ESSA CLASSE FOI CRIADA COMO COPIA IDENTICA DE ClientesController
     * PODE HAVER BASTANTE COISA ESTRANHA AQUI
     * 
     */

class RelatorioPresencaController extends Controller
{
   
    protected $repository;
    protected $validator;
    protected $service;

    public function __construct(PresencaRepository $repository, PresencaValidator $validator, PresencaService $service,UserRepository $userRepository,ClienteRepository $clienteRepository)
    {
        $this->userRepository = $userRepository;
        $this->clienteRepository = $clienteRepository;
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service = $service;
    }


    public function index()
    {
        $presencas = $this->repository->all();
        $user_list = $this->userRepository->selectBoxList();
        $cliente_list = $this->clienteRepository->selectBoxList();
        $presencas = null;
        $posts = null;
        return view('relatorio.presenca', [
            'presencas' => $presencas,
            'user_list' => $user_list,
            'cliente_list' => $cliente_list,

        ]);
    }


    public function store(PresencaCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        //dd($request);
        $presenca = $request['success'] ? $request['data']: null;

        session()->flash('success',[
            'success'   => $request['success'],
            'messages'  => $request['messages']
        ]);
        
        return redirect()->route('relatorio.presenca');
    }


    public function searchPresenca(Request $request, Presenca $relatorio){
        $user_list = $this->userRepository->selectBoxList();  
        $cliente_list = $this->clienteRepository->selectBoxList();   
        $dataForm = $request->all();
        //dd($dataForm);
        //$user = Auth::user();
        //$dataForm['user_id'] = $user->getId();
       
        $posts=null;
        if(isset($dataForm['data']) && isset($dataForm['user_id']) && isset($dataForm['cliente_id'])){
        $posts = $this->repository->findWhere(['data'=>$dataForm['data'],'user_id'=>$dataForm['user_id'],'cliente_id'=>$dataForm['cliente_id']]);
        }
        elseif(isset($dataForm['data']) && isset($dataForm['user_id'])){
            $posts = $this->repository->findWhere(['data'=>$dataForm['data'],'user_id'=>$dataForm['user_id']]);
        }
        elseif(isset($dataForm['data']) && isset($dataForm['cliente_id'])){
            $posts = $this->repository->findWhere(['data'=>$dataForm['data'],'cliente_id'=>$dataForm['cliente_id']]);
        }
        elseif( isset($dataForm['user_id']) && isset($dataForm['cliente_id'])){
        $posts = $this->repository->findWhere(['user_id'=>$dataForm['user_id'],'cliente_id'=>$dataForm['cliente_id']]);
        }
        elseif(isset($dataForm['data'])){
            $posts = $this->repository->findWhere(['data'=>$dataForm['data'] ]);
        }
        elseif(isset($dataForm['user_id'])){
            $posts = $this->repository->findWhere(['user_id'=>$dataForm['user_id'] ]);
        }
        elseif(isset($dataForm['cliente_id'])){
            $posts = $this->repository->findWhere(['cliente_id'=>$dataForm['cliente_id'] ]);
        }
        

        
        //dd($posts);
        //dd(Auth::guard());
        return view('relatorio.presenca', [
            'presencas'=> $posts,
            'user_list' => $user_list,
            'cliente_list'=> $cliente_list,
        ]);
    }
    
    public function show($id)
    {
        $presenca = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $Presenca,
            ]);
        }

        return view('presenca.show', compact('presenca'));
    }

    public function edit($id)
    {
        $presenca = $this->repository->find($id);

        return view('presenca.edit', compact('presenca'));
    }

    public function update(PresencaUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $presenca = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Presenca updated.',
                'data'    => $presenca->toArray(),
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


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Presenca deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Presenca deleted.');
    }
}

