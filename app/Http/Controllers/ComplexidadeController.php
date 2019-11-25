<?php

namespace App\Http\Controllers;

use App\Models\Complexidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ComplexidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complexidade = Complexidade::all();
        return view('complexidade.index', compact('complexidade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complexidade.create');
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
        if (Complexidade::create($request->except('_token'))) {
            Session::flash('flash_message_success', 'Complexidade cadastrada com sucesso!');
        } else {
            Log::channel('slack')->error('Erro ao cadastrar Complexidade!');
            Session::flash('flash_message_error', 'Complexidade não cadastrada! Por favor, tente novamente.');
        }
        return redirect('complexidade');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complexidade  $complexidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Complexidade $complexidade)
    {
        return view('complexidade.edit', compact('complexidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complexidade  $complexidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complexidade $complexidade)
    {
        $request->validate([
            'descricao' => 'required|max:100',
        ]);
        if ($complexidade->update($request->except('_token'))) {
            Session::flash('flash_message_success', 'Complexidade alterada com sucesso!');
        } else {
            Log::channel('slack')->error('Erro ao alterar Complexidade!');
            Session::flash('flash_message_error', 'Complexidade não alterada! Por favor, tente novamente.');
        }
        return redirect('complexidade');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complexidade  $complexidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complexidade $complexidade)
    {
        if ($complexidade->delete()) {
            Session::flash('flash_message_success', 'Complexidade excluída com sucesso!');
        } else {
            Log::channel('slack')->error('Erro ao excluir Complexidade!');
            Session::flash('flash_message_error', 'Complexidade não excluída! Por favor, tente novamente.');
        }
        return redirect('complexidade');
    }
}
