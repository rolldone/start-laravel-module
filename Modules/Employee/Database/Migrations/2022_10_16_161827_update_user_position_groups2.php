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
        Schema::table('em_user_position_groups', function (Blueprint $table) {
            $table->boolean("is_enabled")->default(false)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('em_user_position_groups', function (Blueprint $table) {
            $table->dropColumn(["is_enabled"]);
        });
    }
};
