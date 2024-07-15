<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asesor;

class AsesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION=5;
    public function index(Request $request)
    {
        //
        $buscarpor=trim($request->get('buscarpor'));
        $asesor = Asesor::where(function ($query) use ($buscarpor) {
            $query->where(function ($subQuery) use ($buscarpor) {
                $subQuery->where('nombres', 'LIKE', '%' . $buscarpor . '%')
                        ->orWhere('apellidos', 'LIKE', '%' . $buscarpor . '%');
            })
            ->orWhereRaw("CONCAT(nombres, ' ', apellidos) LIKE ?", ['%' . $buscarpor . '%'])
            ->orWhere('dni', 'LIKE', '%' . $buscarpor . '%');
        })
        ->paginate($this::PAGINATION);
        return view('asesores.index',compact('asesor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('asesores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idasesor)
    {
        //
        $asesor=Asesor::find($idasesor);
        return view('asesores.edit',compact('asesor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idasesor)
    {
        //
        $asesor=Asesor::find($idasesor);
        $asesor->nombres=$request->nombres;
        $asesor->apellidos=$request->apellidos;
        $asesor->dni=$request->dni;
        $asesor->edad=$request->edad;
        $asesor->Direccion=$request->Direccion;
        $asesor->bancaria=$request->bancaria;
        $asesor->interbancaria=$request->interbancaria;

        if ($request->hasFile('Foto')) {
            // Eliminar la imagen anterior
            $rutaAnterior = 'Foto/' . $asesor->Foto;
            if (file_exists(public_path($rutaAnterior))) {
                unlink(public_path($rutaAnterior));
            }

            // Guardar la nueva imagen
            $Foto = $request->file('Foto');
            $rutaGuardarFoto = 'Foto/';
            $FotoPerfil = date('YmdHis') . "." . $Foto->getClientOriginalExtension();
            $Foto->move($rutaGuardarFoto, $FotoPerfil);
            $asesor->Foto = $FotoPerfil;
        }
        $asesor->save();
        return redirect()->route('asesores.index')->with('mensaje','Se ha Actualizado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
