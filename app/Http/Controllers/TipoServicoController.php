<?php

namespace App\Http\Controllers;

use App\Models\TipoServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class TipoServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoServico = TipoServico::all();
        return view('tipoServico.index', compact('tipoServico'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoServico.create');
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
        if (TipoServico::create($request->except('_token'))) {
            Session::flash('flash_message_success', 'Tipo de Serviço cadastrado com sucesso!');
        } else {
            Log::channel('slack')->error('Erro ao cadastrar Tipo de Serviço!');
            Session::flash('flash_message_error', 'Tipo de Serviço não cadastrado! Por favor, tente novamente.');
        }
        return redirect('tipoServico');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoServico  $tipoServico
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoServico $tipoServico)
    {
        return view('tipoServico.edit', compact('tipoServico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoServico  $tipoServico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoServico $tipoServico)
    {
        $request->validate([
            'descricao' => 'required|max:100',
        ]);
        if ($tipoServico->update($request->except('_token'))) {
            Session::flash('flash_message_success', 'Tipo de Serviço alterado com sucesso!');
        } else {
            Log::channel('slack')->error('Erro ao alterar Tipo de Serviço!');
            Session::flash('flash_message_error', 'Tipo de Serviço não alterado! Por favor, tente novamente.');
        }
        return redirect('tipoServico');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoServico  $tipoServico
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoServico $tipoServico)
    {
        if ($tipoServico->delete()) {
            Session::flash('flash_message_success', 'Tipo de Serviço excluído com sucesso!');
        } else {
            Log::channel('slack')->error('Erro ao excluir Tipo de Serviço!');
            Session::flash('flash_message_error', 'Tipo de Serviço não excluído! Por favor, tente novamente.');
        }
        return redirect('tipoServico');
    }
}
