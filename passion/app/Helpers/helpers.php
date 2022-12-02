<?php
/**
 * Created by PhpStorm.
 * User: OLADEJI BUSARI
 * Date: 5/17/2018
 * Time: 8:27 AM
 */
function currentUser()
{
    return \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check();
}



function gameThereIs()
{
    if (\App\Solos\Modules\System\Model\System::where('id', '1')->where('activeGameDate', date('d-m-Y'))->where('activeGameStatus', '0')->first()) return true;
    return false;
}
