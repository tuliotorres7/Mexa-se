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
        return view('presenca.index', [
            'presencas' => $presenca,
            'user_list' => $user_list,
        ]);
    }

    public function store(PresencaCreateRequest $request)
    {
       
        $request = $this->service->store($request->all());
        dd($request);
        $presenca = $request['success'] ? $request['data']: null;
        session()->flash('success',[
            'success'   => $request['success'],
            'messages'  => $request['messages']
        ]);
        
        return redirect()->route('presenca.index');
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
        $presenca = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $presenca,
            ]);
        }

        return view('presencas.show', compact('presenca'));
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
        $presenca = $this->repository->find($id);

        return view('presencas.edit', compact('presenca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PresencaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
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
                'message' => 'Presenca deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Presenca deleted.');
    }
}
