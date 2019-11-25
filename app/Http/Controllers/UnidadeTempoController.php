<?php

namespace App\Http\Controllers;

use App\Models\UnidadeTempo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class UnidadeTempoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidadeTempo = UnidadeTempo::all();
        return view('unidadeTempo.index', compact('unidadeTempo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unidadeTempo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|max:100',
        ]);
        if (UnidadeTempo::create($request->except('_token'))) {
            Session::flash('flash_message_success', 'Unidade de Tempo cadastrada com sucesso!');
        } else {
            Log::channel('slack')->error('Erro ao cadastrar Unidade de Tempo!');
            Session::flash('flash_message_error', 'Unidade de Tempo não cadastrada! Por favor, tente novamente.');
        }
        return redirect('unidadeTempo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnidadeTempo  $unidadeTempo
     * @return \Illuminate\Http\Response
     */
    public function edit(UnidadeTempo $unidadeTempo)
    {
        return view('unidadeTempo.edit', compact('unidadeTempo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnidadeTempo  $unidadeTempo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnidadeTempo $unidadeTempo)
    {
        $request->validate([
            'descricao' => 'required|max:100',
        ]);
        if ($unidadeTempo->update($request->except('_token'))) {
            Session::flash('flash_message_success', 'Unidade de Tempo alterada com sucesso!');
        } else {
            Log::channel('slack')->error('Erro ao alterar Unidade de tempo!');
            Session::flash('flash_message_error', 'Unidade de Tempo não alterada! Por favor, tente novamente.');
        }
        return redirect('unidadeTempo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnidadeTempo  $unidadeTempo
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadeTempo $unidadeTempo)
    {
        if ($unidadeTempo->delete()) {
            Session::flash('flash_message_success', 'Unidade de Tempo excluída com sucesso!');
        } else {
            Log::channel('slack')->error('Erro ao excluir Unidade de Tempo!');
            Session::flash('flash_message_error', 'Unidade de Tempo não excluída! Por favor, tente novamente.');
        }
        return redirect('unidadeTempo');
    }
}
