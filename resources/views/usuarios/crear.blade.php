@extends('admin.plantilla')
@section('title','Usuarios')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Alta de Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                     
{{-- cuadro que informe los errores de campos no llenados --}}
                            @if($errors->any())
                               <div class="alert alert-dark alert alert-dismissible fade show" role="alert">
                                <strong>¡Revise los campos!</strong>
                                    @foreach($errors->all() as $error)
                                    <br><i class="bi bi-exclamation-circle"></i><span {{-- class="badge badge-danger" --}}>{{$error}}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                               </div>
                            @endif

                            <form action="{{ route('usuarios.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                        </div>
                                    </div>
                            
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                                        </div>
                                    </div>
                            
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                            
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="confirm-password">Confirmar Password</label>
                                            <input type="password" name="confirm-password" class="form-control">
                                        </div>
                                    </div>
                            
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="roles">Roles</label>
                                            <select name="roles[]" class="form-control">
                                                <option>-- Seleccione un Rol --</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role }}">{{ $role }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-center w-100">
                                        <button type="submit" class="btn btn-primary mx-2">Guardar</button>
                                        <a class="btn btn-secondary mx-2" href="{{ route('usuarios.index') }}">Cancelar</a>
                                    </div>
                                </div>
                            </form>
                            


                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

