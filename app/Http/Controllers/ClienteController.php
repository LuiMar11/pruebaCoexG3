<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $texto = $req->get('texto');
        $clientes = DB::table('clientes')
            ->select(
                '*'
            )->where('nombres', 'LIKE', '%' . $texto . '%')
            ->orWhere('apellidos', 'LIKE', '%' . $texto . '%')
            ->orWhere('cedula', 'LIKE', '%' . $texto . '%')
            ->paginate(10);

        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = request()->except('_token');
        Cliente::insert($cliente);
        Alert::success('Cliente agregado a la base de datos');
        return redirect(route('cliente.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except('_token', '_method');
        Cliente::where('id', '=', $id)->update($datos);
        $cliente = Cliente::findOrFail($id);
        Alert::success('Cliente actualizado');
        return redirect(route('cliente.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        Cliente::destroy($id);
        Alert::success('Cliente eliminado');
        return redirect(route('cliente.index'));
    }
}
