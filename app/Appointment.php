<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Specialty;
use Carbon\Carbon;

class Appointment extends Model
{
    protected $fillable = [
        'description',
        'doctor_id',
        'patient_id',
        'specialty_id',
        'scheduled_date',
        'scheduled_time',
        'type'
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class);
    }

    public function patient()
    {
        return $this->belongsTo(User::class);
    }

    public function cancellation()
    {
        return $this->hasOne(CancelledAppointment::class);
    }

    //accesor
    //$appointment->schedule_time_12
    public function getScheduledTime12Attribute()
    {
        return (new Carbon($this->scheduled_time))->format('g:i A');
    }
}
