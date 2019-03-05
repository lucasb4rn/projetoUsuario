<?php

namespace projetoUsuario;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable 

{
    public $timestamps = false;

    protected $fillable = array('name', 
    'email', 'cpf', 'data_nascimento', 'password', 'avatar', 'situacao_id');

    public function situacao(){
        return $this->belongsTo('projetoUsuario\Situacao');
    }


}
