<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\InstrutorRepository;
use App\Entities\Instrutor;
use App\Validators\InstrutorValidator;

/**
 * Class InstrutorRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class InstrutorRepositoryEloquent extends BaseRepository implements InstrutorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Instrutor::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return InstrutorValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
