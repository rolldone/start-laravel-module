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
            $table->foreign("division_id")->references("id")->on("gm_divisions")->onDelete("cascade");
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
            $table->dropForeign("gm_positions_division_id_foreign");
        });
    }
};
