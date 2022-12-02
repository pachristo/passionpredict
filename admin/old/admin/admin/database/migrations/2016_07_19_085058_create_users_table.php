<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('username');
            $table->string('password');
            $table->string('country');
            $table->string('state');
            $table->string('country_code');
            $table->string('subscription_type');
            $table->boolean('subscription_status');
            $table->dateTime('date_subscribed');
            $table->dateTime('next_due_date');
            $table->dateTime('dateGift');
            $table->integer('sub_count');
            $table->string('account_type');
            $table->boolean('status');
            $table->boolean('flag');
            $table->boolean('other');
            $table->boolean('newsletterConfirm')->default('0');
            $table->string('mailDate');

            $table->string('provider');
            $table->string('provider_id');
            $table->string('avatar');

            $table->string('passport');

            $table->string('retrievecode');
            $table->boolean('retrievestatus');

            $table->rememberToken();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
