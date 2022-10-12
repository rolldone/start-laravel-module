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
        Schema::create('gm_portals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("gm_rel_id")->nullable()->unsigned();
            $table->string("gm_table_name")->nullable();
            $table->bigInteger("group_id")->nullable()->unsigned();
            $table->boolean("is_enable")->nullable()->default(true);
            // $table->bigInteger("employee_id")->nullable()->unsigned();
            // $table->bigInteger("position_id")->nullable()->unsigned();
            // $table->bigInteger("division_id")->nullable()->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gm_portals');
    }
};
