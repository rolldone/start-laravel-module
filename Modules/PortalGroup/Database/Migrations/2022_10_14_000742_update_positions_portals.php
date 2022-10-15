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
            $table->bigInteger("pg_portal_id")->nullable()->unsigned();
            // Relation
            $table->foreign("pg_portal_id")->nullOnDelete()->references("id")->on("pg_portals")->onDelete("set null");
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
            $table->dropForeign(["pg_portal_id"]);
            $table->dropColumn(["pg_portal_id"]);
        });
    }
};
