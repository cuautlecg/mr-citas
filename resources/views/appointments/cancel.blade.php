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

        <form action="" method="POST">
            @csrf
            <label for="justification">Por favor, cuentanos el motivo de cancelación:</label>
            <textarea name="justification" id="justification" rows="4" class="form-control">
            </textarea>
            <button class="btn btn-danger" type="submit">Cancelar cita</button>
        </form>
    </div>
</div>
@endsection
