<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->timestamp('data');
            $table->string('descricao');
            $table->integer('tempoGasto')->nullable();
            $table->unsignedInteger('unidadeTempo_id')->nullable();
            $table->unsignedInteger('complexidade_id')->nullable();
            $table->unsignedInteger('status_id')->nullable();
            $table->unsignedInteger('tipoServico_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitacaos');
    }
}
