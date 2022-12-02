<?php

namespace App\Solos\Modules\BookingCode\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BookingCode extends Model

{

    protected $table='booking_codes';
    private $country;

    public function __construct(){

         if(strpos('Nigeria', COUNTRYNAME)!==false  ){

             $this->country='Nigeria';

        }elseif(strpos('Tanzania, United Republic of', COUNTRYNAME)!==false ){

            $this->country='Tanzania, United Republic of';

        }elseif(strpos('Ghana', COUNTRYNAME)!==false ){

           $this->country='Ghana';

        }elseif(strpos('Uganda', COUNTRYNAME)!==false ){

            $this->country='Uganda';

        }elseif(strpos('Kenya', COUNTRYNAME)!==false ){

            $this->country='Kenya';

        }elseif(strpos('South Africa',COUNTRYNAME)!==false ){

            $this->country='South Africa';

        }else{

           $this->country='All';
        }


    }

    public function yesterdayGame()
    {
        $country=$this->country;
        return $this->where('status', '0')->where('country',$country)->where('codeDate', Carbon::today()->subDay(1)->format('d-m-Y'));
    }

    public function yesterday1Game()
    {
        $country=$this->country;
        return $this->where('status', '0')->where('country',$country)->where('codeDate', Carbon::today()->subDay(2)->format('d-m-Y'));
    }

    public function yesterday2Game()
    {
        $country=$this->country;
        return $this->where('status', '0')->where('country',$country)->where('codeDate', Carbon::today()->subDay(3)->format('d-m-Y'));
    }

    public function todayGame()
    {
       // die($this->country.'--------'.COUNTRYNAME);
       $country=$this->country;
        return $this->where('status', '0')->where('country',$country)->where('codeDate', Carbon::today()->format('d-m-Y'));

    }

    public function today1Game()
    {
        $country=$this->country;
        return $this->where('status', '0')->where('country',$country)->where('codeDate', Carbon::today()->addDay(1)->format('d-m-Y'));
    }

    public function today2Game()
    {
        $country=$this->country;
        return $this->where('status', '0')->where('country',$country)->where('codeDate', Carbon::today()->addDays(2)->format('d-m-Y'));
    }

    public function today3Game()
    {
        $country=$this->country;
        return $this->where('status', '0')->where('country',$country)->where('codeDate', Carbon::today()->addDays(3)->format('d-m-Y'));
    }

}
