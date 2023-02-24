<?php

namespace App\Http\Controllers;

use App\Models\Credito;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creditos = Credito::all();
        $clientes = Cliente::all();
        return view('credito.index', compact('creditos', 'creditos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $clientes = Cliente::all();
        return view('credito.create',compact('clientes'));
    }

    public function searchCliente(Request $req)
    {
        $cedula = $req->get('cedula');
        $cliente = DB::table('clientes')
            ->select(
                'cedula'
            )->where('cedula', 'LIKE', '%' . $cedula . '%');

        return $cliente;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credito = new Credito();
        $credito->num_pagare = $request->get('num_pagare');
        $credito->monto_credito = $request->get('monto_credito');
        $credito->cuota_mensual = $request->get('cuota_mensual');
        $credito->id_cliente = $request->get('id_cliente');

        
        $credito->save();
        Alert::success('Crédito creado');
        return redirect(route('credito.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $credito = Credito::findOrFail($id);
        return view('credito.show', compact('credito'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $credito = Credito::findOrFail($id);
        return view('credito.edit', compact('credito'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except('_token', '_method');
        Credito::where('id', '=', $id)->update($datos);
        $credito = Credito::findOrFail($id);
        Alert::success('Credito actualizado');
        return redirect(route('credito.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $credito = Credito::findOrFail($id);
        credito::destroy($id);
        Alert::success('Credito eliminado');
        return redirect(route('credito.index'));
    }
}
