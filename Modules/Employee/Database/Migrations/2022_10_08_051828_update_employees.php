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
        Schema::table('em_employees', function (Blueprint $table) {
            if (Schema::hasColumn("em_employees", "status") == false) {
                $table->tinyInteger("status")->default(1)->unsigned();
            }
            $table->dropForeign(['user_id']);
            $table->bigInteger("user_id")->nullable()->unsigned()->change();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('em_employees', function (Blueprint $table) {
            if (Schema::hasColumn('employees', 'status') == true) {
                $table->dropColumn("status");
            }
        });
    }
};
