@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center mb-3">
            <div class="col">
                <h3 class="mb-0">Especialidades</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('specialties/create')}}" class="btn btn-sm btn-success">
                    Nueva especialidad
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <span class="alert-inner--text">{{ session('success') }}!</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session('update'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-inner--text">{{ session('update') }}!</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-inner--text">{{ session('delete') }}!</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($specialties as $specialty)
                <tr>
                    <th scope="row">
                        {{$specialty->name}}
                    </th>
                    <td>
                        {{$specialty->description}}
                    </td>
                    <td>
                        <a href="{{url('specialties/' . $specialty->id .'/edit')}}"
                            class="btn btn-primary btn-sm">Editar</a>
                        <a href="{{url('specialties/' . $specialty->id)}}" class="btn btn-danger btn-sm" onclick="event.preventDefault();
                            document.getElementById('delete-form').submit();">
                            Eliminar
                        </a>
                        <form id="delete-form" action="{{url('specialties/'.$specialty->id)}}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
