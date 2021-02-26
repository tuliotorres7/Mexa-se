<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\InstrutorCreateRequest;
use App\Http\Requests\InstrutorUpdateRequest;
use App\Repositories\InstrutorRepository;
use App\Validators\InstrutorValidator;

/**
 * Class InstrutorsController.
 *
 * @package namespace App\Http\Controllers;
 */
class InstrutorsController extends Controller
{
    /**
     * @var InstrutorRepository
     */
    protected $repository;

    /**
     * @var InstrutorValidator
     */
    protected $validator;

    /**
     * InstrutorsController constructor.
     *
     * @param InstrutorRepository $repository
     * @param InstrutorValidator $validator
     */
    public function __construct(InstrutorRepository $repository, InstrutorValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $instrutors = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $instrutors,
            ]);
        }

        return view('instrutors.index', compact('instrutors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  InstrutorCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(InstrutorCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $instrutor = $this->repository->create($request->all());

            $response = [
                'message' => 'Instrutor created.',
                'data'    => $instrutor->toArray(),
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instrutor = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $instrutor,
            ]);
        }

        return view('instrutors.show', compact('instrutor'));
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
        $instrutor = $this->repository->find($id);

        return view('instrutors.edit', compact('instrutor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  InstrutorUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(InstrutorUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $instrutor = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Instrutor updated.',
                'data'    => $instrutor->toArray(),
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
                'message' => 'Instrutor deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Instrutor deleted.');
    }
}
