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
        Schema::table('gm_divisions', function (Blueprint $table) {
            $table->foreign("parent_id")->references("id")->on("gm_divisions")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gm_divisions', function (Blueprint $table) {
            $table->dropForeign('gm_divisions_parent_id_foreign');
        });
    }
};
