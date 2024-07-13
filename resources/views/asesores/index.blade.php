@extends('admin.plantilla')
@section('title','Perfil de usuario')
@section('content')

<div class="card">
    <div class="card-header">
      <h4>Lista de Asesores</h4>
    </div>
    <div class="card-header">
 
    <h4>
      <a href="#" class="btn btn-primary"><i class="bi bi-plus-circle-fill mr-2"></i>Crear nuevo</a>
    </h4>

      <div class="card-header-form">
        <form>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Buscar">
            <div class="input-group-btn">
              <button class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-hover" >
        <thead>
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Edad</th>
            <th scope="col">Correo</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>David</td>
            <td>56</td>
            <td>david@gmail.com</td>
            <td>
              <a href="#" class="btn btn-warning">Editar</a>
              <a href="#" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>
              <a href="#" class="btn btn-warning">Editar</a>
              <a href="#" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>
              <a href="#" class="btn btn-warning">Editar</a>
              <a href="#" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card-footer text-right">
      <nav class="d-inline-block">
        <ul class="pagination mb-0">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
          </li>
          <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
          </li>
        </ul>
      </nav>
    </div>
  </div>


@endsection