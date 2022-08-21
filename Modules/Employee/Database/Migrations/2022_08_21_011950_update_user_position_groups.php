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
        Schema::table("em_user_position_groups", function (Blueprint $table) {
            // Module GroupManagement
            $table->foreign("group_id")->references("id")->on("gm_groups")->onDelete("cascade");
            $table->foreign("position_id")->references("id")->on("gm_positions")->onDelete("cascade");
            $table->foreign("division_id")->references("id")->on("gm_divisions")->onDelete("cascade");

            // Module Employee
            $table->foreign("employee_id")->references("id")->on("em_employees")->onDelete("cascade");
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
            $table->dropForeign(["group_id", "position_id", "division_id", "employee_id"]);
        });
    }
};
