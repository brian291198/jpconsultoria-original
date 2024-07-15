@extends('admin.plantilla')
@section('title','Perfil de usuario')
@section('content')

<div class="card">
  <div class="card-header">
    <h2>Lista de Asesores</h2>
  </div>
  <div class="card-header">

      <h4>
        {{-- <a href="{{route('asesores.create')}}" class="btn btn-primary"><i class="bi bi-plus-circle-fill mr-2"></i>Crear nuevo</a> --}}
      </h4>

      <div class="card-header-form">
        <form>
          <div class="input-group row">
            <form action="{{route('asesores.index')}}" method="get">
                <input type="text" class="form-control" name="buscarpor" aria-label="Search" placeholder="Buscar">
                <div class="input-group-btn">
                  <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
            </form>
          </div>

          
        </form>
        
      </div>
      
  </div>
  
  <div class="card-body">
    
    <table class="table" >
      
      <thead class="text-center">
        {{-- MENSAJE --}}
        @if (session('mensaje'))
          <div id="mensaje-container" class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('mensaje') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <script>
              // Esperar 3.5 segundos y ocultar el mensaje
              setTimeout(function() {
                  document.getElementById('mensaje-container').style.display = 'none';
              }, 3500);
          </script>
        @endif
        <tr>
          <th scope="col">N°</th>
          <th scope="col">Nombre</th>
          <th scope="col">Dni</th>
          <th scope="col">Edad</th>
          <th scope="col">Cuenta Bancaria</th>
          <th scope="col">Cuenta Interbancaria</th>
          <th scope="col">Accion</th>
        </tr>
      </thead>
      <tbody>
        {{-- Cuerpo Tabla --}}
          @if (count($asesor)<=0)
              <tr>
                <td class="text-center" colspan="7">No hay Registros...</td>
              </tr>
          @else
              @foreach ($asesor as $a)
                <tr class="text-center">
                  <td>{{($asesor->currentPage() - 1) * $asesor->perPage() + $loop->index + 1}}</td>
                  <td>{{$a->nombres}} {{$a->apellidos}}</td>
                  <td>{{$a->dni}}</td>
                  <td>{{$a->edad}}</td>
                  <td>{{$a->bancaria}}</td>
                  <td>{{$a->interbancaria}}</td>

                  <td class="text-left text-center">
                      <form action="{{route('asesores.edit',$a->idasesor)}}" method="GET" >
                          <button class="btn btn-warning btn-sm" type="submit"><i class="far fa-user" ></i></button>  
                      </form>
                  </td>
                </tr>
              @endforeach
          @endif
      </tbody>
    </table>
  </div>
  @if ($asesor->lastPage() > 1)
            <div class="d-flex justify-content-end my-3">
                <nav aria-label="Page navigation">
                    <ul class="pagination mb-0">
                        @if ($asesor->currentPage() > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $asesor->url($asesor->currentPage() - 1) }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $asesor->lastPage(); $i++)
                            <li class="page-item {{ $asesor->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $asesor->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($asesor->currentPage() < $asesor->lastPage())
                            <li class="page-item">
                                <a class="page-link" href="{{ $asesor->url($asesor->currentPage() + 1) }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
  @endif
</div>


@endsection