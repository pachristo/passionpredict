<?php

namespace App\Solos\Modules\Prediction\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{

    protected $table='predictions';
    public function yesterday1Game()
    {
        return $this->where('display', '0')->where('gameDate', Carbon::today()->subDay(2)->format('d-m-Y'));
    }

    public function yesterday2Game()
    {
        return $this->where('display', '0')->where('gameDate', Carbon::today()->subDay(3)->format('d-m-Y'));
    }

    public function yesterdayGame()
    {
        return $this->where('display', '0')->where('gameDate', Carbon::today()->subDay(1)->format('d-m-Y'));
    }

    public function todayGame()
    {
        return $this->where('display', '0')->where('gameDate', Carbon::today()->format('d-m-Y'));
    }

    public function today1Game()
    {
        return $this->where('display', '0')->where('gameDate', Carbon::today()->addDay(1)->format('d-m-Y'));
    }

    public function today2Game()
    {
        return $this->where('display', '0')->where('gameDate', Carbon::today()->addDays(2)->format('d-m-Y'));
    }

    public function today3Game()
    {
        return $this->where('display', '0')->where('gameDate', Carbon::today()->addDays(3)->format('d-m-Y'));
    }
}
