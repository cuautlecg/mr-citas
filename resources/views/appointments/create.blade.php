@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Registrar nueva cita</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('patients')}}" class="btn btn-sm btn-warning">
                    Cancelar y volver
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{url('appointments')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" class="form-control" placeholder="Describe brevemente tus síntomas..."
                          name="description" id="description" required value="{{old('description')}}" />
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="specialty">Especialidad</label>
                        <select name="specialty_id" id="specialty" class="form-control" required>
                            <option>Selecione una especialidad</option>
                            @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->id }}" @if(old('specialty_id') == $specialty->id) selected @endif>{{ $specialty->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Médico</label>
                        <select name="doctor_id" id="doctor" class="form-control" required>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}" @if(old('doctor_id') == $doctor->id) selected @endif>
                                    {{ $doctor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Fecha</label>
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control datepicker" placeholder="Seleccionar fecha"
                           id="date" name="scheduled_date" type="text"
                           value="{{ old('scheduled_date', date('Y-m-d')) }}"
                           data-date-format="yyyy-mm-dd"
                           data-date-start-date="{{ date('Y-m-d') }}"
                           data-date-end-date="+30d">
                </div>
            </div>
            <div class="form-group">
                <label for="hours">Hora de atención</label>
                <div id="hours">
                    @if ($intervals)
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Horario Matutino</h4>
                                    @foreach ($intervals['morning'] as $key => $interval)
                                        <div class="custom-control custom-radio mb-3">
                                                <input name="scheduled_time" value="{{$interval['start']}}" class="custom-control-input"
                                                        id="intervalMorning{{$key}}" type="radio" required>
                                            <label class="custom-control-label" for="intervalMorning{{$key}}">{{$interval['start']}} - {{$interval['end']}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6">
                                    <h4>Horario Vespertino</h4>
                                    @foreach ($intervals['afternoon'] as $key => $interval)
                                        <div class="custom-control custom-radio mb-3">
                                                <input name="scheduled_time" value="{{$interval['start']}}" class="custom-control-input"
                                                        id="intervalAfternoon{{$key}}" type="radio" required>
                                            <label class="custom-control-label" for="intervalAfternoon{{$key}}">{{$interval['start']}} - {{$interval['end']}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info" role="alert">
                            Selecciona un médico y una fecha para ver sus horarios disponibles...
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="type">Tipo de consulta</label>
                <div class="custom-control custom-radio mb-3">
                    <input type="radio" name="type" id="type1" class="custom-control-input"
                    @if (old('type', 'Consulta') == 'Consulta') checked @endif value="Consulta">
                    <label for="type1" class="custom-control-label">Consulta</label>
                </div>
                <div class="custom-control custom-radio mb-3">
                    <input type="radio" name="type" id="type2" class="custom-control-input"
                    @if (old('type') == 'Examen')) checked @endif value="Examen">
                    <label for="type2" class="custom-control-label">Examen</label>
                </div>
                <div class="custom-control custom-radio mb-3">
                    <input type="radio" name="type" id="type3" class="custom-control-input"
                    @if (old('type') == 'Operación')) checked @endif value="Operación">
                    <label for="type3" class="custom-control-label">Operación</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/appointments/create.js')}}"></script>
@endsection
