<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Presenca.
 *
 * @package namespace App\Entities;
 */
class Presenca extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['data','user_id','cliente_id'];

    public function instrutor()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function cliente()
    {
        return $this->belongsTo(User::class,'cliente_id');
    }
    

    public $timestamps = true;
}
