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
        Schema::create('gm_positions', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->boolean("is_enable")->default(true);
            $table->bigInteger("gm_division_id")->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gm_positions');
    }
};
