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
        Schema::create('pv_privileges_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("pv_privilege_id")->nullable()->unsigned();
            // $table->string("key")->nullable();
            $table->json("privilege_data")->nullable();
            $table->timestamps();

            // RElation
            $table->foreign("pv_privilege_id")->references("id")->on("pv_privileges")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pv_privileges_items');
    }
};
