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

    protected $fillable = ['nome','user_id'];

    public function instrutor()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function search(Array $data,$totalPage){
        $relatorio = $this->where(function($query)use ($data){
            echo $data['type'];
            if(isset($data['type']))
                $query->where('user_id',$data['type']);
        })//->toSql();
        //dd($relatorio);
        //return $relatorio;
        ->paginate($totalPage);
        return $relatorio;
    }

    public $timestamps = true;


}
