@extends('admin.plantilla')
@section('title','Perfil de usuario')
@section('content')

<h3>Editar asesor</h3>
<div class="container-fluid">
    {{-- SCRIPT PARA FECHA --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<br>
    <form action="{{route('asesores.update',$asesor->idasesor)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card my-2 mx-5" >
            <div class="my-4 mx-4">
                <div class="text-center">
                    <h1>Perfil del Asesor</h1>
                </div>
                <div class="row g-0">

                    <div class="col-md-4">
                        <!-- Para ver la imagen seleccionada, de lo contrario no se -->
                        <div class="text-center grid grid-cols-1 mt-4 mx-7"> 
                            <img src="/Foto/{{$asesor->Foto}}" id="image" style="max-height: 400px;">
                        </div>

                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <div class='flex items-center justify-center w-full'>
                                <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                                    <div class='flex flex-col items-center justify-center pt-7'></div>
                                <input name="Foto" id="Foto" type='file' class="form-control @error('Nombre') is-invalid @enderror" onchange="hideReferenceImage()">
                                    @error('Foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="a" class="form-label">Nombres: </label>
                                    <input type="text" name="nombres" class="form-control @error('nombres') is-invalid @enderror" value="{{old('nombres',$asesor->nombres)}}">
                                        @error('nombres')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="a" class="form-label">Apellidos: </label>
                                    <input type="text" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror" value="{{old('apellidos',$asesor->apellidos)}}">
                                        @error('apellidos')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="a" class="form-label">Cuenta Bancaria BCP</label>
                                    <input type="text" class="form-control @error('bancaria') is-invalid @enderror" name="bancaria" value="{{old('bancaria',$asesor->bancaria)}}">
                                        @error('bancaria')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="a" class="form-label">Cuenta Interbancaria</label>
                                    <input type="text" class="form-control @error('interbancaria') is-invalid @enderror" name="interbancaria" value="{{old('interbancaria',$asesor->interbancaria)}}">
                                        @error('interbancaria')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="a" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp" name="email">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="mb-3 col-3">
                                    <label for="a" class="form-label">Edad</label>
                                    <input type="text" class="form-control @error('edad') is-invalid @enderror" name="edad" value="{{old('edad',$asesor->edad)}}">
                                        @error('edad')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="mb-3 col-3">
                                    <label for="a" class="form-label">Dni</label>
                                    <input type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{old('dni',$asesor->dni)}}">
                                        @error('dni')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="a" class="form-label">Dirección</label>
                                    <input type="text" class="form-control @error('Fecha_Nac') is-invalid @enderror" name="Direccion" value="{{old('Direccion',$asesor->Direccion)}}">
                                        @error('Direccion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <input class="btn btn-success" type="submit" value="Guardar">
                                <a class="btn btn-primary" href="{{route('asesores.index')}}">Volver</a>
                            </div>
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
        $(document).ready(function() {
            $('.js-example-basic-single').select2();

            // Ocultar el SVG cuando se selecciona una imagen
            $('#Foto').change(function() {
                if (this.files.length > 0) {
                    $('#svg').hide();
                } else {
                    $('#svg').show();
                }
            });
        });
    </script>

    <script>
        function hideReferenceImage() {
            const referenceImage = document.getElementById('referenceImage');
            referenceImage.style.display = 'none';
        };
    </script>

    {{-- Previsualizaciónd e imágen --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
    <script>   
        $(document).ready(function (e) {   
            $('#Foto').change(function(){            
                let reader = new FileReader();
                reader.onload = (e) => { 
                    $('#imagenSeleccionada').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
            });
        });
    </script>



@endsection