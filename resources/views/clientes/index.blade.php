@extends('admin.plantilla')
@section('title','Perfil de usuario')
@section('content')

<div class="card">
    <div class="card-header">
    <h2>Lista de Clientes</h2>
    </div>
    <div class="card-header">

        @can('Crear clientes')
        <h4>
            <a href="{{route('clientes.create')}}" class="btn btn-primary"><i class="bi bi-plus-circle-fill mr-2"></i>Crear nuevo</a>
        </h4>
        @endcan
        <div class="card-header-form">
            <form>
                <div class="input-group row">
                    <form action="{{route('clientes.index')}}" method="get">
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
            <th scope="col">Nombres</th>
            <th scope="col">Edad</th>
            <th scope="col">Telefono</th>
            <th scope="col">Dni</th>
            <th scope="col">Correo</th>
            @can('Editar clientes')
            <th colspan="3" class="text-center">Accion</th>
            @endcan
            </tr>
        </thead>
        <tbody>
            {{-- Cuerpo Tabla --}}
            @if (count($clientes)<=0)
                <tr>
                    <td class="text-center" colspan="7">No hay Registros...</td>
                </tr>
            @else
                @foreach ($clientes as $c)
                    <tr class="text-center">
                        <td>{{($clientes->currentPage() - 1) * $clientes->perPage() + $loop->index + 1}}</td>
                        <td>{{$c->nombre}} {{$c->apellidos}}</td>
                        <td>{{$c->edad}}</td>
                        <td>{{$c->telefono}}</td>
                        <td>{{$c->num_documento}}</td>
                        <td>{{$c->correo}}</td>
                        @can('Editar clientes')
                        <td class="text-right">
                            <form action="{{route('clientes.destroy',$c->idcliente)}}" method="POST" class="formulario-eliminar">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                        
                        <td class="text-left">
                            <form action="{{route('clientes.edit',$c->idcliente)}}" method="GET" >
                                <button class="btn btn-warning btn-sm" type="submit"><i class="far fa-user" ></i></button>  
                            </form>
                        </td>
                        @endcan
                    </tr>
                @endforeach
            @endif
        </tbody>
        </table>
    </div>
    @if ($clientes->lastPage() > 1)
                <div class="d-flex justify-content-end my-3">
                    <nav aria-label="Page navigation">
                        <ul class="pagination mb-0">
                            @if ($clientes->currentPage() > 1)
                                <li class="page-item">
                                    <a class="page-link" href="{{ $clientes->url($clientes->currentPage() - 1) }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            @endif

                            @for ($i = 1; $i <= $clientes->lastPage(); $i++)
                                <li class="page-item {{ $clientes->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $clientes->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($clientes->currentPage() < $clientes->lastPage())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $clientes->url($clientes->currentPage() + 1) }}" aria-label="Next">
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


@section('js')
    @if (session('datos')== 'OK') 
        <script>
            Swal.fire({
                title: "Eliminado",
                text: "El registro se ha eliminado",
                icon: "success"
            });
        </script>
    @endif

    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
                title: "Estás seguro?",
                text: "El registro se eliminará permanentemente",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar"
                }).then((result) => {
                if (result.value) {
                    /* Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                    }); */
                    this.submit();
                }
            });
        });
    </script>

@endsection