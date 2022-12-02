<?php

namespace App\Solos\Modules\Transaction\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table="transactions";
    protected $fillable = [
        'transactionRef',
        'transactionID',
        'transactionType',
        'userID',
        'planID',
        'subDate',
        'statusCode',
        'amountPaid',
        'ipAddress',
        'authCode'
    ];
}
