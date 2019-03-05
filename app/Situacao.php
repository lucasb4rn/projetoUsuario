<?php

namespace projetoUsuario;

use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{

    protected $fillable = array('nome');

    protected $table = 'situacao';

    public function usuarios(){
        return $this->hasMany('projetoUsuario\Usuario');
    }


}
