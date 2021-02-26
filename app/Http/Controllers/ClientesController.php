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


/**
 * Class ClientesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ClientesController extends Controller
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
    public function __construct(ClienteRepository $repository, ClienteValidator $validator, ClienteService $service)
    {
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

        return view('cliente.index', [
            'clientes' => $clientes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClienteCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ClienteCreateRequest $request)
    {
        
        $request = $this->service->store($request->all());
        $cliente = $request['success'] ? $request['data']: null;

        session()->flash('success',[
            'success'   => $request['success'],
            'messages'  => $request['messages']
        ]);
        
        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = $this->repository->find($id);

        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ClienteUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
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
