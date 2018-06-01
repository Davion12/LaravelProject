<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTChannelConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("t_channel_config",  function (Blueprint $table) {
            $table->increments('channel_id');
            $table->string('channel_name');
            $table->integer('channel_contact_phone')->unique();
            $table->string('login_pwd');
            $table->dateTime('cooperation_start_dt');
            $table->dateTime('cooperation_end_dt');
            $table->string('contract_subject');
            $table->tinyInteger('gathering_type');
            $table->string('deposit_bank');
            $table->string('gathering_account');
            $table->string('remark');
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
        //
        Schema::drop('t_channel_config');
    }
}
