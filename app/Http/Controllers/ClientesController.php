<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION=5;
    public function index(Request $request)
    {
        //
        $buscarpor=trim($request->get('buscarpor'));
        $clientes = Clientes::where(function ($query) use ($buscarpor) {
            $query->where(function ($subQuery) use ($buscarpor) {
                $subQuery->where('nombre', 'LIKE', '%' . $buscarpor . '%')
                        ->orWhere('apellidos', 'LIKE', '%' . $buscarpor . '%');
            })
            ->orWhereRaw("CONCAT(nombre, ' ', apellidos) LIKE ?", ['%' . $buscarpor . '%'])
            ->orWhere('num_documento', 'LIKE', '%' . $buscarpor . '%')
            ->orWhere('telefono', 'LIKE', '%' . $buscarpor . '%');
        })
        ->paginate($this::PAGINATION);
        return view('clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:60|regex:/^[a-zA-Z\s]+$/',
            'apellidos' => 'required|string|max:60|regex:/^[a-zA-Z\s]+$/',
            'num_documento' => 'required|string|max:8|unique:clientes,num_documento|regex:/^[1467][0-9]{7}$/',
            'edad' => 'required|integer',
            'correo' => 'required|email|unique:clientes,correo',
            'telefono' => 'required|string|max:9|regex:/^9[0-9]{8}$/',
        ]);
        $clientes=$request->all();
        Clientes::create($clientes);
        return redirect()->route('clientes.index')->with('mensaje','Se ha registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idcliente)
    {
        //
        $clientes=Clientes::find($idcliente);
        return view('clientes.edit',compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idcliente)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:60|regex:/^[a-zA-Z\s]+$/',
            'apellidos' => 'required|string|max:60|regex:/^[a-zA-Z\s]+$/',
            'num_documento' => 'required|string|max:8|regex:/^[1467][0-9]{7}$/',
            'edad' => 'required|integer',
            'correo' => 'required|email',
            'telefono' => 'required|string|max:9|regex:/^9[0-9]{8}$/',
        ]);
        $clientes=Clientes::find($idcliente);
        $clientes->nombre=$request->nombre;
        $clientes->apellidos=$request->apellidos;
        $clientes->num_documento=$request->num_documento;
        $clientes->edad=$request->edad;
        $clientes->correo=$request->correo;
        $clientes->telefono=$request->telefono;
        $clientes->save();
        return redirect()->route('clientes.index')->with('mensaje','Se ha Actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $idcliente)
    {
        //
        $clientes = Clientes::find($idcliente);
        $clientes->delete();
        return redirect('clientes')->with('datos','OK');
    }
}
