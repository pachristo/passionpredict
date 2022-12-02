<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdwordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adwords', function (Blueprint $table) {
            $table->increments('id');
            $table->string('a250by250')->nullable();
            $table->string('a200by200')->nullable();
            $table->string('a468by60')->nullable();
            $table->string('a728by90')->nullable();
            $table->string('a300by250')->nullable();
            $table->string('a320by100')->nullable();
            $table->string('a336by280')->nullable();
            $table->string('a120by600')->nullable();
            $table->string('a160by600')->nullable();
            $table->string('a300by600')->nullable();
            $table->string('a970by90')->nullable();
            $table->string('a320by50')->nullable();
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
        Schema::dropIfExists('adwords');
    }
}
