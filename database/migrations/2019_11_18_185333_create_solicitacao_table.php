<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->timestamp('data');
            $table->string('descricao');
            $table->integer('tempoGasto')->nullable();
            $table->string('ocorrencias')->nullable();
            //Unidade de Tempo
            $table->bigInteger('unidadeTempo_id')->unsigned()->nullable();
            $table->foreign('unidadeTempo_id')->references('id')->on('unidade_tempo');
            //Complexidade
            $table->bigInteger('complexidade_id')->unsigned()->nullable();
            $table->foreign('complexidade_id')->references('id')->on('complexidade');
            //Status
            $table->bigInteger('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('status');
            //Tipo de Servico
            $table->bigInteger('tipoServico_id')->unsigned()->nullable();
            $table->foreign('tipoServico_id')->references('id')->on('tipo_servico');
            //User
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('solicitacao');
    }
}
