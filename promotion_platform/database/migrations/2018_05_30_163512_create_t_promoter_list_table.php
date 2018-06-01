<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTPromoterListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("t_promoter_list",  function (Blueprint $table) {
            $table->increments('promoter_id');
            $table->string('promoter_name');
            $table->string('promoter_phone')->unique();
            $table->string('login_pwd');
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
        //删除表格
        Schema::drop('t_promoter_list');
    }
}
