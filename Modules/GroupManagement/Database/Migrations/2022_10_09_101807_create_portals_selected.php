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
        Schema::create('gm_portals_selected', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->nullable()->unsigned();
            $table->bigInteger("portal_id")->nullable()->unsigned();
            $table->json("data")->nullable();
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
        Schema::dropIfExists('gm_portals_selected');
    }
};
