<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PresencaRepository;
use App\Entities\Presenca;
use App\Validators\PresencaValidator;

/**
 * Class PresencaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PresencaRepositoryEloquent extends BaseRepository implements PresencaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Presenca::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PresencaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
