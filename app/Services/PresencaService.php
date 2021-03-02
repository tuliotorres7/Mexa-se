<?php
namespace App\Services;

use App\Repositories\ClienteRepository;
use App\Validators\ClienteValidator;

use Prettus\Validator\Contracts\ValidatorInterface;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;
use Exception;

class PresencaService{
    private $repository;
    private $validator;

    public function __construct(PresencaRepository $repository,PresencaValidator $validator){
        $this->repository =$repository;
        $this->validator = $validator;

    }

    public function store(array $data){
        try{
            
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $presenca = $this->repository->create($data);


            return [
            'success'=> true,
            'messages' => "Presença cadastrada",
            'data' => $presenca,
            ];


        }catch(Exception $e){
            switch(get_class($e)){
                case QueryException::class      : return['success '=>false,'messages' => $e->getMessage()];
                case ValidatorException::class  : return['success '=>false,'messages' => $e->getMessageBag()];
                case Exception::class           : return['success '=>false,'messages' => $e->getMessage()];
                default                         : return['success' => false, 'messages' => get_class($e)];
            }
        }
    }
}