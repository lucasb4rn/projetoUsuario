<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionandoCampoSituacaoIdUsuarios extends Migration
{
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->integer('situacao_id')->default(1);
        });
    }

    public function down()
    {
        Schema::dropColumn('usuarios');
    }
}
