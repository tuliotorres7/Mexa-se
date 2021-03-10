<?php
namespace App\Services;

use App\Repositories\PresencaRepository;
use App\Validators\PresencaValidator;
use Carbon\Carbon;
use Prettus\Validator\Contracts\ValidatorInterface;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;
use Exception;
use Auth;

class PresencaService{
    private $repository;
    private $validator;

    public function __construct(PresencaRepository $repository,PresencaValidator $validator){
        $this->repository =$repository;
        $this->validator = $validator;
    }
    
    public function store(array $data){
        try{
            $mytime = Carbon::now();
            $data['data'] = $mytime->format("Y-m-d");
            $mytime = Carbon::now();
            //dd($mytime->format("Y-m-d H:m:s"));
            $mytime->format("Y-m-d H:m");/////////////
            $data['dataHora'] = $mytime;
            $user = Auth::user();

            $data['user_id'] = $user->getId();
            
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $presenca = $this->repository->create($data);
            
            //dd($presenca);

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
        public function store2(array $data){
            try{
                dd($data);
                $mytime = Carbon::now();
                $mytime->toDateTimeString();
                $data['data'] = $mytime;
                $user = Auth::user();
                $data['user_id'] = $user->getId();
                $data['data'] = $mytime;
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
