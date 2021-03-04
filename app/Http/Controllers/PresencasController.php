<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PresencaCreateRequest;
use App\Http\Requests\PresencaUpdateRequest;
use App\Validators\PresencaValidator;

use App\Repositories\UserRepository;
use App\Services\PresencaService;
use App\Repositories\PresencaRepository;

/**
 * Class PresencasController.
 *
 * @package namespace App\Http\Controllers;
 */
class PresencasController extends Controller
{
    protected $repository;
    protected $validator;
    protected $service;

    public function __construct(PresencaRepository $repository, PresencaValidator $validator, PresencaService $service, UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service =$service;
        
    }
    public function index()
    {
        
        $presenca = $this->repository->all();
        $user_list = $this->userRepository->selectBoxList();
        return view('Presenca.index', [
            'presencas' => $presenca,
            'user_list' => $user_list,
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
        
        return redirect()->route('presenca.index');
    }

    public function show($id)
    {
        $presenca = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $presenca,
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

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Presenca deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Cliente deleted.');
    }
}
