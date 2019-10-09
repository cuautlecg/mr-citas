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
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($confirmedAppointments as $appointment)
            <tr>
                <th scope="row">
                    {{$appointment->description}}
                </th>
                <td>
                    {{$appointment->specialty->name}}
                </td>
                <td>
                    {{$appointment->doctor->name}}
                </td>
                <td>
                    {{$appointment->scheduled_date}}
                </td>
                <td style="text-align:center;">
                    {{$appointment->scheduled_time_12}}
                </td>
                <td>
                    {{$appointment->type}}
                </td>
                <td>
                    <a href="{{url('appointments/' . $appointment->id . '/cancel')}}" class="btn btn-danger btn-sm">
                        Cancelar
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="card-body">
    {{$confirmedAppointments->links()}}
</div>
