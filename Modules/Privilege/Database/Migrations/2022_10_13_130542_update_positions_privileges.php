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
        Schema::table('gm_positions', function (Blueprint $table) {
            $table->bigInteger("pv_privilege_id")->nullable()->unsigned();
            // Relation
            $table->foreign("pv_privilege_id")->references("id")->on("pv_privileges")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gm_positions', function (Blueprint $table) {
            $table->dropForeign(["pv_privilege_id"]);
            $table->dropColumn(["pv_privilege_id"]);
        });
    }
};
