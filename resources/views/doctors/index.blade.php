@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center mb-3">
            <div class="col">
                <h3 class="mb-0">Médicos</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('doctors/create')}}" class="btn btn-sm btn-success">
                    Nuevo médico
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
                    <th scope="col">No. Cédula</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                <tr>
                    <th scope="row">
                        {{$doctor->name}}
                    </th>
                    <td>
                        {{$doctor->email}}
                    </td>
                    <td>
                            {{$doctor->cedula}}
                        </td>
                    <td>
                        <a href="{{url('doctors/' . $doctor->id .'/edit')}}"
                            class="btn btn-primary btn-sm">Editar</a>
                        <a href="{{url('doctors/' . $doctor->id)}}" class="btn btn-danger btn-sm" onclick="event.preventDefault();
                            document.getElementById('delete-form').submit();">
                            Eliminar
                        </a>
                        <form id="delete-form" action="{{url('doctors/'.$doctor->id)}}" method="POST"
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
