@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Nueva especialidad</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('specialties')}}" class="btn btn-sm btn-warning">
                    Cancelar y volver
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                <span class="alert-inner--text"><strong>Error!</strong> {{$error}}</span>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


        @endif
        <form action="{{url('specialties')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre de la especialidad</label>
                <input type="text" name="name" class="form-control" required value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" name="description" class="form-control" value="{{old('description')}}">
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
@endsection
