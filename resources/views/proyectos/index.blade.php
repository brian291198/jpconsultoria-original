@extends('admin.plantilla')
@section('title','Perfil de usuario')
@section('content')

<div class="card">
    <div class="card-header">
    <h2>Lista de Proyectos</h2>
    </div>
    <div class="card-header">
        <h4>
            <a href="{{route('proyecto_user.create')}}" class="btn btn-primary"><i class="bi bi-plus-circle-fill mr-2"></i>Asignar proyecto</a>
        </h4>

        <div class="card-header-form">
            <form>
                <div class="input-group row">
                    <form action="{{route('proyecto_user.index')}}" method="get">
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
            <th scope="col">Asesor</th>
            <th scope="col">Cliente</th>
            <th scope="col">Carrera</th>
            <th scope="col">Pago</th>
            <th scope="col">Estado</th>
            <th scope="col">Ultima comunicación por wp</th>
            <th scope="col">Link de drive</th>
            <th colspan="3" class="text-center">Accion</th>
            </tr>
        </thead>
        <tbody>
            {{-- Cuerpo Tabla --}}
            @if (count($proyectos_user)<=0)
                <tr>
                    <td class="text-center" colspan="10">No hay Registros...</td>
                </tr>
            @else
                @foreach ($proyectos_user as $pr)
                    <tr class="text-center">
                        <td>{{($proyectos_user->currentPage() - 1) * $proyectos_user->perPage() + $loop->index + 1}}</td>
                        <td>David Edinson Vigo Rodríguez</td>
                        <td>{{ $pr->nombrecli }} {{ $pr->apellidocli }}</td>
                        <td>{{ $pr->carrera }}</td>
                        <td>{{ $pr->estado_pago }}</td>
                        <td>{{ $pr->estado_trabajo }}</td>
                        <td>{{ $pr->fechacontacto_ultima }}</td>
                        <td><a href="{{ $pr->link_drive }}">Link Drive</a></td>

                        <td class="text-left">
                            <form action="#" method="GET" >
                                <button class="btn btn-warning btn-sm" type="submit"><i class="far fa-user" ></i></button>  
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        </table>
    </div>
    @if ($proyectos_user->lastPage() > 1)
                <div class="d-flex justify-content-end my-3">
                    <nav aria-label="Page navigation">
                        <ul class="pagination mb-0">
                            @if ($proyectos_user->currentPage() > 1)
                                <li class="page-item">
                                    <a class="page-link" href="{{ $proyectos_user->url($proyectos_user->currentPage() - 1) }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            @endif

                            @for ($i = 1; $i <= $proyectos_user->lastPage(); $i++)
                                <li class="page-item {{ $proyectos_user->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $proyectos_user->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($proyectos_user->currentPage() < $proyectos_user->lastPage())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $proyectos_user->url($proyectos_user->currentPage() + 1) }}" aria-label="Next">
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