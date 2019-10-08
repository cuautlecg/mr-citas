@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center mb-3">
            <div class="col">
                <h3 class="mb-0">Mis Citas</h3>
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
                    <th scope="col">Descripción</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Médico</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora de atención</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                <tr>
                    <th scope="row">
                        {{$appointment->description}}
                    </th>
                    <td>
                        {{$appointment->specialty_id}}
                    </td>
                    <td>
                        {{$appointment->doctor_id}}
                    </td>
                    <td>
                        {{$appointment->scheduled_date}}
                    </td>
                    <td>
                        {{$appointment->scheduled_time}}
                    </td>
                    <td>
                        {{$appointment->type}}
                    </td>
                    <td>
                        {{$appointment->status}}
                    </td>
                    <td>
                        <a href="{{url('appointments/' . $appointment->id .'/edit')}}" class="btn btn-primary btn-sm">Editar</a>
                        <a href="{{url('appointments/' . $appointment->id)}}" class="btn btn-danger btn-sm" onclick="event.preventDefault();
                            document.getElementById('delete-form').submit();">
                            Eliminar
                        </a>
                        <form id="delete-form" action="{{url('appointments/'.$appointment->id)}}" method="POST"
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
