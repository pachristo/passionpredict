<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transactionRef')->nullable();
            $table->string('transactionID')->nullable();
            $table->string('transactionType')->nullable();
            $table->integer('userID')->default('0');
            $table->integer('planID')->default('0');
            $table->dateTime('subDate')->nullable();
            $table->string('statusCode')->nullable();
            $table->string('amountPaid')->nullable();
            $table->ipAddress('ipAddress')->nullable();
            $table->string('authCode')->nullable();
            $table->integer('status')->default('0');
            $table->integer('other')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
