<?php

namespace App\Services;

use App\Appointment;
use App\Interfaces\ScheduleServiceInterface;
use Illuminate\Support\Carbon;
use App\WorkDay;

class ScheduleService implements ScheduleServiceInterface
{

    private function getDayFromDate($date)
    {
        $dateCarbon = new Carbon($date);

        //Aquí se obtiene el día de la semana
        //Carbon: 0: sunday, 6: saturday
        //WorkDay: 0: Monday, 6 Saturday
        $i = $dateCarbon->dayOfWeekIso;
        $day = ($i==0 ? 6 : $i = $i-1);
        return $day;
    }

    public function getAvailableIntervals($date, $doctorId)
    {
        $workDay = WorkDay::where('active', true)
            ->where('day', $this->getDayFromDate($date))
            ->where('user_id', $doctorId)
            ->first([
                'morning_start', 'morning_end',
                'afternoon_start', 'afternoon_end'
            ]);

        if (!$workDay) {
            return [];
        }

        $morningIntervals = $this->getIntervals(
            $workDay->morning_start, $workDay->morning_end,
            $date, $doctorId
        );

        $afternoonIntervals = $this->getIntervals(
            $workDay->afternoon_start, $workDay->afternoon_end,
            $date, $doctorId
        );

        $data = [];
        $data['morning'] = $morningIntervals;
        $data['afternoon'] = $afternoonIntervals;

        return $data;
    }

    private function getIntervals($start, $end, $date, $doctorId){
        $start = new Carbon($start);
        $end = new Carbon($end);

        $intervals = [];

        while($start < $end){
            $interval = [];
            $interval['start'] = $start->format('g:i A');
            //Se valida que el médico en cuestión no tenga una cita a esa mis hora, en caso de que sí, no se agrega al arreglo de horas
            $exists = Appointment::where('doctor_id', $doctorId)
                                 ->where('scheduled_date', $date)
                                 ->where('scheduled_time', $start->format('H:s:i'))
                                 ->exists();
            $start->addMinutes(30);
            $interval['end'] = $start->format('g:i A');

            if (!$exists) {
                $intervals[]= $interval;
            }

        }

        return $intervals;
    }
}
