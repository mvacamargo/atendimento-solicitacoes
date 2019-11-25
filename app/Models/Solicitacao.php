<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    protected $table = 'solicitacao';
    protected $fillable = ['email', 'data', 'descricao', 'tempoGasto', 'ocorrencias', 'unidadeTempo_id', 'complexidade_id', 'status_id', 'tipoServico_id'];
    protected $dates = ['data'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
