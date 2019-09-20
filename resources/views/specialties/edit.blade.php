@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Modificar especialidad</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('specialties')}}" class="btn btn-sm btn-warning">
                    Cancelar y volver
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{url('specialties/'. $specialty->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre de la especialidad</label>
                <input type="text" name="name" class="form-control" value="{{old('name', $specialty->name)}}">
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" name="description" class="form-control" value="{{old('description', $specialty->description)}}">
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
    </div>
</div>
@endsection
