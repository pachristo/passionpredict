<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sms_recovery extends Model
{
    //


    protected $table='sms_recoveries';


    protected $fillable=[
    	'user_id',
    	'sub_id',
    	'date_subscribed',
    	'due_date',
    	


    ];
}
