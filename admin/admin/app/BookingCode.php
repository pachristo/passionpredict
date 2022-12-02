<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingCode extends Model
{

    protected $table="booking_codes";
    protected $fillable = [
        'codeDate',
        'codeTime',
        'country',
        'VIPCategory',
        'bookMaker',
        'bookingCode',
        'totalOdds',
        'totalGames',
        'codeStatus',
        'status',
    ];

    public function getGames($date)
    {
        return $this->where('codeDate', $date)->get();
    }
}
