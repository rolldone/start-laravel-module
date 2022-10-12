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
        Schema::table('gm_portals_selected', function (Blueprint $table) {
            $table->bigInteger("portal_group_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gm_portals_selected', function (Blueprint $table) {
            $table->dropColumn(['portal_group_id']);
        });
    }
};
