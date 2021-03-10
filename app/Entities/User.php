<?php

namespace App\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
     //id?
    protected $fillable = [
        'cpf','nome','email','telefone', 'password','status','permission'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getId(){
        return $this->attributes['id'];
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] =  env('PASSWORD_HASH') ? bcrypt($value): $value;
    }

    public function getFormattedCpfAttribute(){
        $cpf = $this->attributes['cpf'];
        return substr($cpf,0,3).".".substr($cpf,3,3).".".substr($cpf,7,3)."-".substr($cpf,-2);
    }
    public function getFormattedTelefoneAttribute(){
        $telefone = $this->attributes['telefone'];
        return "(".substr(0,2).") ".substr($telefone,2,4)."-".substr($telefone,-4);
    }
}

