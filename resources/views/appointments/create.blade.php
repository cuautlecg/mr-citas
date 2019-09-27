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
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                <span class="alert-inner--text"><strong>Error!</strong> {{$error}}</span>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form action="{{url('patients')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Especialidad</label>
                <select name="" id="" class="form-control">
                    @foreach ($specialties as $specialty)
                        <option value="{{$specialty->name}}">
                            {{$specialty->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="email">Médico</label>
                <select name="" id="" class="form-control"></select>
            </div>
            <div class="form-group">
                <label for="address">Fecha</label>
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input type="text" name="address" class="form-control datepicker" value="{{old('address')}}"
                    placeholder="Seleccione una fecha">
                </div>
            </div>
            <div class="form-group">
                <label for="phone">Hora de atención</label>
                <input type="tel" name="phone" class="form-control" value="{{old('phone')}}">
            </div>
            <div class="form-group">
                <label for="phone">Número de telefóno / Celular</label>
                <input type="tel" name="phone" class="form-control" value="{{old('phone')}}">
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
@endsection
