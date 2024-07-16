@extends('admin.plantilla')

@section('content')
    {{-- <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Usuario</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           
                            @if($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                <strong>¡Revise los campos!</strong>
                                    @foreach($errors->al() as $error)
                                       <span class="badge badge-danger">{{$error}}</span>
                                    @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            @endif

                            {!! Form::model($user, ['method'=> 'PATCH','route'=>['usuarios.update',$user->id]])!!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        {!! Form::text('name', null, array('class'=>'form-control'))!!}
                                    </div>

                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        {!! Form::text('email', null, array('class'=>'form-control'))!!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        {!! Form::password('password', array('class'=>'form-control'))!!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="confirm-password">Confirmar Password</label>
                                        {!! Form::password('confirm-password', array('class'=>'form-control'))!!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Roles</label>
                                        {!! Form::select('roles[]',$roles,[], array('class'=>'form-control'))!!}
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        {!! Form::close()!!}

   



                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}




    <div id="app">
        <section class="section">
          <div class="container mt-5">
            <div class="row">
              <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="login-brand">
                  <img src="img/jpconsultoria_logo.jpg" alt="logo" width="50" class="shadow-light">
                </div>
    
                <div class="card card-primary">
                  <div class="card-header"><h4>Editar usuario - {{ $usuarios->id}}</h4></div>

                  <div class="card-body">
                    <form method="POST" action="{{ route("usuarios.update",$usuarios->id)}}">
                      @csrf
                      @method('put')


                
                        <div class="form-group">
                          <label for="frist_name">N° identificador del cliente</label>
                          <input id="frist_name" style="display:none;" type="text" class="form-control" name="id" value="{{ $usuarios->id }}" disabled>
                        </div>
                     
                        <div class="form-group">
                          <label for="frist_name">Nombre</label>
                          <input id="frist_name" type="text" class="form-control" name="name" value="{{ $usuarios->name }}" autofocus >
                        </div>
    
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email"  value="{{ $usuarios->email }}">
                        <div class="invalid-feedback">
                        </div>
                      </div>

                        <div class="form-group">
                          <label for="password" class="d-block">Password</label>
                          <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                          <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                          </div>
                        </div>
 
                     {{--  <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" value="Send">
                          Registrar
                        </button>
                      </div> --}}
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">
                          Guardar
                        </button>
                      </div>

                      <div class="form-group">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-danger btn-lg" >
                          Cancelar
                        </a>
                      </div>



                      <div class="col-md-3" >
                        <button style="margin-left: 60px;margin-top: 20px"  type="submit" class="btn btn-primary"><i class="fas fasave"></i> Guardar</button>
                    </div>
            
                    <div class="col-md-3" >
                        <a style="margin-top: 20px"  href="{{ route('cancelarp')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
                    </div>




                    </form>
                  </div>
                </div>



                <div class="simple-footer">
                  Copyright &copy; Team UNT 2024
                </div>



              </div>
            </div>
          </div>
        </section>
      </div>








@endsection

