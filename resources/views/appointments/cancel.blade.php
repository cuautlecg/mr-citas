@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center mb-3">
            <div class="col">
                <h3 class="mb-0">Cancelar cita</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if (session('notification'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <span class="alert-inner--text">{{ session('notification') }}!</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="{{ url('/appointments/'.$appointment->id.'/cancel') }}" method="POST">
            @csrf
            <small>Estás a punto de cancelar tú cita con el médico <strong>{{$appointment->doctor->name}}</strong>
            el día <strong>{{$appointment->scheduled_date}}</strong></small>
            <div class="form-group">
                <label for="justification">Por favor, cuentanos el motivo de cancelación:</label>
                <textarea required name="justification" id="justification" rows="3" class="form-control">
                </textarea>
            </div>
            <button class="btn btn-danger" type="submit">Cancelar cita</button>
            <a href="{{'/appointments'}}" class="btn btn-primary">Volver atrás</a>
        </form>
    </div>
</div>
@endsection
