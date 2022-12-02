<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Sms_subscription;

class User extends Model
{
    protected $dates = [
        'date_subscribed',
        'next_due_date',
        'dateGift'
        ];
    protected $table="users";
    protected $fillable = [
      'full_name',
      'email',
      'phone',
      'username',
      'password',
      'country',
        'phone_status',
        'sms_status',
        'sms_subscription_status',
        'sms_subscribed_date',
        'sms_due_date',
        'username',
        'country_code',
        'sms_subs_id',
      'subscription_type',
      'subscription_status',
      'date_subscribed',
      'next_due_date',
      'sub_count'
    ];

    public function queryExpired()
    {
        $affected = User::where('next_due_date', '<', Carbon::now())->where('subscription_status', '1')->update(['subscription_status' => '0']);
        return $affected;
    }
     public function querySmsExpired()
    {
        $affected = User::where('sms_due_date', '<', Carbon::now())->where('sms_subscription_status', '1')->update(['sms_subscription_status' => null]);
        return $affected;
    }


    public function sub()
    {
        return $this->hasOne('App\Subscription', 'id', 'subscription_id');
    }

    public function userSelect($id)
    {
        return $this->find($id);
    }

        public function message_sub($sms_subs_id)
    {
        //return $this->hasOne('App\sms_subscriptions','sms_subs_id','id');
        return Sms_subscription::where('id',$sms_subs_id)->first();
    }
}
