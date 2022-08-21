<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists("em_user_position_groups");
        Schema::create('em_user_position_groups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("position_id")->unsigned();
            $table->bigInteger("division_id")->unsigned();
            $table->bigInteger("group_id")->unsigned();
            $table->bigInteger("employee_id")->unsigned();
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
        Schema::dropIfExists('em_user_position_groups');
    }
};
