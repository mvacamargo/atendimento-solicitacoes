<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoServico extends Model
{
    protected $table = 'tipo_servico';
    protected $fillable = ['descricao'];
}
