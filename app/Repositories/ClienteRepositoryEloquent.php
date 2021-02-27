<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ClienteRepository;
use App\Entities\Cliente;
use App\Validators\ClienteValidator;

/**
 * Class ClienteRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ClienteRepositoryEloquent extends BaseRepository implements ClienteRepository
{

    public function selectBoxList(string $descricao = 'nome',string $chave = 'id'){
        return $this->model->pluck($descricao,$chave)->all();
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cliente::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ClienteValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
