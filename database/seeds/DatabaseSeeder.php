<?php

use Illuminate\Database\Seeder;
use projetoUsuario\Usuario;
use projetoUsuario\Situacao;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('SituacaoTableSeeder');
    }
}


class SituacaoTableSeeder extends Seeder {

    public function run()
    {
        Situacao::create(['nome' => 'ATIVO']);
        Situacao::create(['nome' => 'INATIVO']);
    }

}
