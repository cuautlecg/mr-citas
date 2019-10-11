@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center mb-3">
            <div class="col">
                <h3 class="mb-0">Cita #{{$appointment->id}}</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <ul>
            <li>
                <strong>Fecha: </strong> {{$appointment->scheduled_date}}
            </li>
            <li>
                <strong>Hora: </strong> {{$appointment->scheduled_time_12}}
            </li>
            <li>
                <strong>Tipo de cita: </strong> {{$appointment->type}}
            </li>
            <li>
                <strong>Médico: </strong> {{$appointment->doctor->name}}
            </li>
            <li>
                <strong>Especialidad: </strong> {{$appointment->specialty->name}}
            </li>
            <li>
                <strong>Estado: </strong>
                @if ($appointment->status == 'Cancelada')
                    <span class="badge badge-danger">Cancelada</span>
                @else
                    <span class="badge badge-success">$appointment->status</span>
                @endif
            </li>
        </ul>

        <div class="alert alert-warning">
            <p>Detalles de la cancelación: </p>
            <ul>
                @if ($appointment->cancellation)
                    <li>
                        <strong>Fecha de cancelación:</strong>
                        {{$appointment->cancellation->created_at}}
                    </li>
                    <li>
                        <strong>¿Quién cancelo la cita?:</strong>
                        {{$appointment->cancellation->cancelled_by->name}}
                    </li>
                    <li>
                        <strong>Mótivo de cancelación: </strong>
                        {{$appointment->cancellation->justification}}
                    </li>
                @else
                    <li><strong>Está cita se cancelo antes de su confirmación</strong></li>
                @endif
            </ul>
        </div>

        <a href="{{url('/appointments')}}" class="btn btn-default">Volver al listado</a>
    </div>
</div>
@endsection
