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
        Schema::create('pg_portals_selected', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->nullable()->unsigned();
            $table->bigInteger("pg_portal_id")->nullable()->unsigned();
            $table->bigInteger("pg_portal_group_id")->nullable()->unsigned();
            $table->timestamps();

            // RElation 
            $table->foreign("pg_portal_id")->references("id")->on("pg_portals")->onDelete("cascade");
            $table->foreign("pg_portal_group_id")->references("id")->on("pg_portals_groups")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pg_portals_selected');
    }
};
