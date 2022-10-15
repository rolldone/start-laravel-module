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
        Schema::create('pg_portals_groups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("pg_portal_id")->unsigned()->nullable();
            $table->bigInteger("gm_group_id")->unsigned()->nullable();
            $table->json("data")->nullable();
            $table->timestamps();
            // Set to be unique of two columns
            $table->unique(array('pg_portal_id', 'gm_group_id'));

            // RElation
            $table->foreign("pg_portal_id")->references("id")->on("pg_portals")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pg_portals_groups');
    }
};
