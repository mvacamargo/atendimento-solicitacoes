<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use App\Models\Complexidade;
use App\Models\TipoServico;
use App\Models\UnidadeTempo;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SolicitacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitacao = [];
        $status = Status::all();
        foreach ($status as $s) {
            $solicitacao[$s->id] = DB::table('solicitacao')->where('status_id', '=', $s->id)->get();
        }
        return view('solicitacao.index', compact('solicitacao', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitacao $solicitacao)
    {
        $complexidade = Complexidade::all();
        $tipoServico = TipoServico::all();
        $unidadeTempo = UnidadeTempo::all();
        $status = DB::table('status')->where('descricao', '<>', 'Inicial')->get();
        return view('solicitacao.edit', compact(['solicitacao', 'complexidade', 'tipoServico', 'unidadeTempo', 'status']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitacao $solicitacao)
    {
        $request->validate([
            'tempoGasto' => 'required|integer',
        ]);
        if ($solicitacao->update($request->except('_token'))) {
            Session::flash('flash_message_success', 'Solicitação atualizada com sucesso!');
        } else {
            Log::channel('slack')->error('Erro ao atualizar Solicitação!');
            Session::flash('flash_message_error', 'Solicitação não atualizada! Por favor, tente novamente.');
        }
        return redirect('solicitacao');
    }
}
