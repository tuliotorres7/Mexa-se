<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Cliente.
 *
 * @package namespace App\Entities;
 */
class Cliente extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['nome','telefone','endereco','dataInicio','obs','user_id'];

    public function instrutor()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public $timestamps = true;

}
