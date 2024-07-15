@extends('admin.plantilla')
@section('title','Perfil de usuario')
@section('content')

<div class="container-fluid">
    {{-- SCRIPT PARA FECHA --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <form action="{{route('clientes.update',$clientes->idcliente)}}" method="POST">
        @csrf
        @method('put')
        <div class="card w-75 mx-auto my-5" >
            <div class="my-4 mx-4">
                <div class="text-center">
                    <h1>Nuevo Cliente</h1>
                </div>
                <div class="row">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="a" class="form-label">Nombres: </label>
                                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre',$clientes->nombre)}}">
                                    @error('nombre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label for="a" class="form-label">Apellidos: </label>
                                <input type="text" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror" value="{{old('apellidos',$clientes->apellidos)}}">
                                    @error('apellidos')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="a" class="form-label">Telefono</label>
                                <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{old('telefono',$clientes->telefono)}}">
                                    @error('telefono')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="mb-3 col-6">
                                <label for="a" class="form-label">Correo</label>
                                <input type="email" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{old('correo',$clientes->correo)}}">
                                    @error('correo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="a" class="form-label">Dni</label>
                                <input type="text" class="form-control @error('num_documento') is-invalid @enderror" aria-describedby="emailHelp" name="num_documento" value="{{old('num_documento',$clientes->num_documento)}}">
                                    @error('num_documento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="mb-3 col-6">
                                <label for="a" class="form-label">Edad</label>
                                <input type="text" class="form-control @error('edad') is-invalid @enderror" name="edad" value="{{old('edad',$clientes->edad)}}">
                                    @error('edad')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        
                        
                        <div class="text-center">
                            <input class="btn btn-success mx-3" type="submit" value="Guardar">
                            <a class="btn btn-primary mx-3" href="{{route('clientes.index')}}">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection


