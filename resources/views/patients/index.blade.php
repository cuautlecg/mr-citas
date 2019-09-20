@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center mb-3">
            <div class="col">
                <h3 class="mb-0">Pacientes</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('patients/create')}}" class="btn btn-sm btn-success">
                    Nuevo paciente
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
                    <th scope="col">Email</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                <tr>
                    <th scope="row">
                        {{$patient->name}}
                    </th>
                    <td>
                        {{$patient->email}}
                    </td>
                    <td>
                        {{$patient->address}}
                    </td>
                    <td>
                        <a href="{{url('patients/' . $patient->id .'/edit')}}"
                            class="btn btn-primary btn-sm">Editar</a>
                        <a href="{{url('patients/' . $patient->id)}}" class="btn btn-danger btn-sm" onclick="event.preventDefault();
                            document.getElementById('delete-form').submit();">
                            Eliminar
                        </a>
                        <form id="delete-form" action="{{url('patients/'.$patient->id)}}" method="POST"
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
