@extends('admin.plantilla')
@section('title','Perfil de usuario')
@section('content')

<div class="container-fluid">
    {{-- SCRIPT PARA FECHA --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <form action="{{route('proyecto_user.store')}}" method="POST">
        @csrf
        <div class="card w-80 mx-auto my-3" >
            <div class="my-4 mx-4">
                <div class="text-center">
                    <h1>Asignar Proyecto</h1>
                </div>
                <div class="row">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-2">
                                <label for="a" class="form-label">Área: </label>
                                <select name="idarea" id="idarea" class="form-control"> 
                                    {{-- Id : JS | name: Controlador --}}
                                    @foreach ($area as $a)
                                        <option value="{{$a->idarea}}">{{$a->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-5">
                                <label for="a" class="form-label">Asesor: </label>
                                <select name="idasesor" id="idasesor" class="form-control"> 
                                    {{-- Id : JS | name: Controlador --}}
                                    @foreach ($asesor as $ase)
                                        <option value="{{$ase->idasesor}}">{{$ase->nombres}} {{$ase->apellidos}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-5">
                                <label for="a" class="form-label">Cliente: </label>
                                <select name="idcliente" id="idcliente" class="form-control"> 
                                    {{-- Id : JS | name: Controlador --}}
                                    @foreach ($clientes as $c)
                                        <option value="{{$c->idcliente}}">{{$c->nombre}} {{$c->apellidos}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="mb-3 col-3">
                                <label for="a" class="form-label">Institución</label>
                                <select name="idinstitucion" id="idinstitucion" class="form-control"> 
                                    {{-- Id : JS | name: Controlador --}}
                                    @foreach ($institucion as $i)
                                        <option value="{{$i->idinstitucion}}">{{$i->nombre}}</option>
                                    @endforeach
                                </select>    
                            </div>

                            <div class="mb-3 col-3">
                                <label for="a" class="form-label">Carrera</label>
                                <select name="idcarrera" id="idcarrera" class="form-control"> 
                                    {{-- Id : JS | name: Controlador --}}
                                    @foreach ($carrera as $ca)
                                        <option value="{{$ca->idcarrera}}">{{$ca->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-3">
                                <label for="a" class="form-label">Servicio</label>
                                <select name="idservicio" id="idservicio" class="form-control"> 
                                    {{-- Id : JS | name: Controlador --}}
                                    @foreach ($servicio as $se)
                                        <option value="{{$se->idservicio}}">{{$se->denominacion}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-3">
                                <label for="a" class="form-label">Plan</label>
                                <input type="text" class="form-control" name="plan" id="plan">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="mb-3 col-3">
                                <label for="a" class="form-label">Pago</label>
                                <input type="text" class="form-control @error('estado_pago') is-invalid @enderror" aria-describedby="emailHelp" name="estado_pago">
                                    @error('estado_pago')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="mb-3 col-3">
                                <label for="a" class="form-label">Estado Trabajo</label>
                                <select name="estado_trabajo" id="estado_trabajo" class="form-control"> 
                                    {{-- Id : JS | name: Controlador --}}
                                    <option value="1">Activo</option>
                                    <option value="2">Culminado</option>
                                </select>
                            </div>

                            <div class="mb-3 col-2">
                                <label for="a" class="form-label">Fecha Inicio</label>
                                <input type="text" id="fecha_inicio" class="form-control" name="fecha_inicio" placeholder="YY/MM/DD">
                            </div>

                            <div class="mb-3 col-2">
                                <label for="a" class="form-label">Ultimo contacto wp</label>
                                <input type="text" id="fechacontacto_ultima" class="form-control" name="fechacontacto_ultima" placeholder="YY/MM/DD">
                            </div>

                            <div class="mb-3 col-2">
                                <label for="a" class="form-label">Fecha Fin</label>
                                <input type="text" id="fecha_fin" class="form-control" name="fecha_fin" placeholder="YY/MM/DD">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
                                <textarea class="form-control" id="observaciones"name="observaciones" rows="3"></textarea>
                            </div>

                            <div class="mb-3 col-6">
                                <label for="a" class="form-label">Link de drive</label>
                                <input type="text" class="form-control @error('link_drive') is-invalid @enderror" aria-describedby="emailHelp" name="link_drive">
                                    @error('link_drive')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <input class="btn btn-success mx-3" type="submit" value="Guardar">
                            <a class="btn btn-primary mx-3" href="{{route('proyecto_user.index')}}">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

<script>
    var fechaInputInicio = document.getElementById("fecha_inicio");
    var fechaInputContacto = document.getElementById("fechacontacto_ultima");
    var fechaInputFin = document.getElementById("fecha_fin");

    flatpickr(fechaInputInicio, 
    {
        enableTime: false,
        dateFormat: "Y-m-d",
    });

    flatpickr(fechaInputContacto, 
    {
        enableTime: false,
        dateFormat: "Y-m-d",
    });

    flatpickr(fechaInputFin, 
    {
        enableTime: false,
        dateFormat: "Y-m-d",
    });

</script> 

@endsection
