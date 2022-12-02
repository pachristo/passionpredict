<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sms_transactions extends Model
{
    //

    protected $fillable=[
    	'transactionRef',
    	'transactionID',
    	'transactionType',
    	'userID',
    	'planID',
    	'subDate',
    	'statusCode',
    	'amountPaid',
    	'ipAddress',
    	'authCode',
    	'status',
    	'other',

    ];
}
