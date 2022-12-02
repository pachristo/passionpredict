<?php

namespace App\Solos\Modules\User\Model;
use App\sms_subscriptions;
use App\Solos\Modules\Subscription\Model\Subscription;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\Model;
class User extends EloquentUser
{
    protected $table='users';
    protected $fillable = [
        'id', 'full_name', 'email', 'phone', 'phone_status', 'sms_subs_id', 'sms_subscribed_date', 'sms_due_date', 'sms_status', 'sms_subscription_status', 'username', 'password', 'country', 'state', 'country_code', 'subscription_id', 'subscription_type', 'subscription_status', 'date_subscribed', 'next_due_date', 'sub_count', 'silverSubscriptionID', 'silverSubscriptionStatus', 'silverDateSubscribed', 'silverDueDate', 'silverSubCount', 'goldSubscriptionID', 'goldSubscriptionStatus', 'goldDateSubscribed', 'goldDueDate', 'goldSubCount', 'dateGift', 'account_type', 'status', 'flag', 'other', 'newsletterConfirm', 'mailDate', 'provider', 'provider_id', 'avatar', 'passport', 'permissions', 'last_login', 'created_at', 'updated_at', 'about_me', 'follower', 'following'
    ];

    protected $loginNames = ['email', 'phone'];

    public function sub()
    {
        // return Subscription::all();
        return $this->hasOne(Subscription::class, 'id', 'subscription_id');
    }

    public function messages()
    {
        return sms_subscriptions::all();
    }

    public function message_sub()
    {
        //return $this->hasOne('App\sms_subscriptions','sms_subs_id','id');
        return sms_subscriptions::where('id',$this->sms_subs_id)->first();
    }



}
