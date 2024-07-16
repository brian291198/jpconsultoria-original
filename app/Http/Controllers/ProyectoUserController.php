<?php

namespace App\Http\Controllers;

use App\Models\Proyecto_User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Area;
use App\Models\Carrera;
use App\Models\Institucion;
use App\Models\Proyecto;
use App\Models\Servicio;
use App\Models\Asesor;
use App\Models\Clientes;
use Illuminate\Support\Facades\Auth;



class ProyectoUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION=5;
    public function index(Request $request)
    {
        //
        
        $buscarpor = trim($request->get('buscarpor'));
        $proyectos_user=DB::table('proyecto_user as p')
        ->join('proyectos as pr','p.idproyecto','=','pr.idproyecto')
        ->join('instituciones as i', 'pr.idinstitucion', '=', 'i.idinstitucion')
        ->join('clientes as c', 'pr.idcliente', '=', 'c.idcliente')
        ->join('servicios as s', 'pr.idservicio', '=', 's.idservicio')
        ->join('areas as a', 'pr.idarea', '=', 'a.idarea')
        ->join('carreras as ca', 'pr.idcarrera', '=', 'ca.idcarrera')
        /* ->join('asesores as ase', 'p.idusuario', '=', 'ase.idusuario') */
        ->select('p.idproyecto','c.nombre as nombrecli','c.apellidos as apellidocli','ca.nombre as carrera','pr.estado_pago','pr.estado_trabajo','pr.fechacontacto_ultima','pr.link_drive')
        ->paginate($this::PAGINATION);
        /* dd($proyectos_user); */
        /* return $proyectos_user; */
        return view('proyectos.index', compact('proyectos_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $area = Area::all();
        $carrera = Carrera::all();
        $institucion = Institucion::all();
        $proyecto = Proyecto::all();
        $servicio = Servicio::all();
        $asesor = Asesor::all();
        $clientes = Clientes::all();
        return view('proyectos.create', compact('area', 'carrera','institucion','proyecto','servicio','asesor','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validar los datos del formulario
        /* $validatedData = $request->validate([
            'idarea' => 'required|exists:areas,idarea',
            'idasesor' => 'required|exists:asesores,idasesor',
            'idcliente' => 'required|exists:clientes,idcliente',
            'idinstitucion' => 'required|exists:instituciones,idinstitucion',
            'idcarrera' => 'required|exists:carreras,idcarrera',
            'idservicio' => 'required|exists:servicios,idservicio',
            'plan' => 'required|string',
            'estado_pago' => 'required|string',
            'estado_trabajo' => 'required|string',
            'fechacontacto_ultima' => 'required|date',
            'link_drive' => 'required|url',
            'observaciones' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]); */
        // Crear un nuevo registro de proyecto ProyecUSer - Proyect| Usuario->Asesor
        /* dd($request->estado_pago); */
        $proyecto = new Proyecto();
        $proyecto->idinstitucion =$request->idinstitucion;
        $proyecto->idcliente = $request->idcliente;
        $proyecto->idservicio = $request->idservicio;
        $proyecto->idarea = $request->idarea;
        $proyecto->plan = $request->plan;
        $proyecto->estado_pago = $request->estado_pago;
        $proyecto->estado_trabajo = $request->estado_trabajo;
        $proyecto->fechacontacto_ultima = $request->fechacontacto_ultima;
        $proyecto->link_drive = $request->link_drive;
        $proyecto->observaciones = $request->observaciones;
        $proyecto->fecha_inicio = $request->fecha_inicio;
        $proyecto->fecha_fin = $request->fecha_fin;
        $proyecto->idcarrera = $request->idcarrera;
        $proyecto->save();
        /* dd($request); */
        // Crear un nuevo registro de proyecto_user
        $proyecto_user = new Proyecto_User();
        $proyecto_user->idproyecto = $proyecto->idproyecto;
        $proyecto_user->idusuario = $request->idasesor;
        $proyecto_user->save();
        /* return $proyecto; */
        return redirect()->route('proyecto_user.index')->with('mensaje','Se ha registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto_User $proyecto_User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto_User $proyecto_User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto_User $proyecto_User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto_User $proyecto_User)
    {
        //
    }
}
