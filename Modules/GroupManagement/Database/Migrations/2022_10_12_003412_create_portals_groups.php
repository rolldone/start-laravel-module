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
        Schema::create('gm_portals_groups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("gm_portal_id")->nullable();
            $table->bigInteger("gm_group_id")->nullable();
            $table->timestamps();
            // Set to be unique of two columns
            $table->unique(array('gm_portal_id', 'gm_group_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gm_portals_groups');
    }
};
