<?php

namespace App\Solos\Modules\Ad\Model;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //
    protected $table='ads';


public static function getAds($location,$country){
    // $ads=self::where(function ($query_country) use ($country) {
    //     if (strpos('Nigeria', $country) !== false) {

    //         return $query_country->where('country', 'Nigeria');

    //     }elseif (strpos('Kenya', $country) !== false) {

    //         return $query_country->where('country', 'Kenya');
    //     } else {

    //         return $query_country->where('country', 'All');
    //     }
    // })
    //     ->where('location', $location)
    //     ->where('status', '0')
    //     ->first();

    //     return $ads;
    $ads=self::where('location', $location)
        ->where('status', '0')
        ->get();

        return $ads;
}
public static function getMultiAds($location,$country){
    // $ads=self::where(function ($query_country) use ($country) {
    //     if (strpos('Nigeria', $country) !== false) {

    //         return $query_country->where('country', 'Nigeria');

    //     }elseif (strpos('Kenya', $country) !== false) {

    //         return $query_country->where('country', 'Kenya');
    //     } else {

    //         return $query_country->where('country', 'All');
    //     }
    // })
    //     ->where('location', $location)
    //     ->where('status', '0')
    //     ->first();

    //     return $ads;
    $ads=self::where('location', $location)
        ->where('status', '0')
        ->get();

        return $ads;
}

}
