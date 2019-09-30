@extends('layouts.panel')

@section('styles')
    <!--Boostrap Select -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Editar médico</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('doctors')}}" class="btn btn-sm btn-warning">
                    Cancelar y volver
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                <span class="alert-inner--text"><strong>Error!</strong> {{$error}}</span><br>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form action="{{url('doctors/'. $doctor->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre del médico</label>
                <input type="text" name="name" class="form-control" required value="{{old('name', $doctor->name)}}">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" value="{{old('email', $doctor->email)}}">
            </div>
            <div class="form-group">
                <label for="cedula">No. de Cédula</label>
                <input type="text" name="cedula" class="form-control" value="{{old('cedula', $doctor->cedula)}}">
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" name="address" class="form-control" value="{{old('address', $doctor->address)}}">
            </div>
            <div class="form-group">
                <label for="phone">Número de telefóno / Celular</label>
                <input type="tel" name="phone" class="form-control" value="{{old('phone', $doctor->phone)}}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" value="">
                <small>Ingrese un valor, solo sí desea cambiar de contraseña</small>
            </div>
            <div class="form-group">
                <label for="email">Especialidades</label>
                <select name="specialties[]" id="specialties" class="form-control selectpicker" multiple
                        data-live-search="true" title="Seleccione una o varias especialidades" data-style="btn-outline-primary">
                    @foreach ($specialties as $specialty)
                        <option value="{{$specialty->id}}">
                            {{$specialty->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <!-- Bootstrap Select -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#specialties').selectpicker('val', @json($specialty_ids));
        });
    </script>
@endsection

