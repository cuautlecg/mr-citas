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
        <form action="{{url('patients')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="specialty">Especialidad</label>
                <select name="specialty_id" id="specialty" class="form-control">
                    <option>Selecione una especialidad</option>
                    @foreach ($specialties as $specialty)
                        <option value="{{ $specialty->id }}" @if(old('specialty_id') == $specialty->id) selected @endif>{{ $specialty->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="email">Médico</label>
                <select name="doctor_id" id="doctor" class="form-control">

                </select>
            </div>
            <div class="form-group">
                <label for="address">Fecha</label>
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input type="text" name="address" class="form-control datepicker"
                        id="date"
                        value="{{date('Y-m-d')}}"
                        data-date-format="yyyy-mm-dd"
                        data-date-start-date="{{date('Y-m-d')}}"
                        data-date-end-date="+30d">
                </div>
            </div>
            <div class="form-group">
                <label for="hours">Hora de atención</label>
                <div id="hours">

                </div>
            </div>
            <div class="form-group">
                <label for="type">Tipo de consulta</label>
                <div class="custom-control custom-radio mb-3">
                    <input type="radio" name="type" id="type1" class="custom-control-input">
                    <label for="type1" class="custom-control-label"></label>
                </div>
                <div class="custom-control custom-radio mb-3">
                    <input type="radio" name="type" id="type1" class="custom-control-input">
                    <label for="type1" class="custom-control-label"></label>
                </div>
                <div class="custom-control custom-radio mb-3">
                    <input type="radio" name="type" id="type1" class="custom-control-input">
                    <label for="type1" class="custom-control-label"></label>
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
