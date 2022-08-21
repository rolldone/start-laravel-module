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
        Schema::create('em_employees', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name")->nullable();
            $table->string("address")->nullable();
            $table->string("phone_number")->nullable();
            $table->string("email");
            $table->bigInteger("user_id")->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table("em_employees", function (Blueprint $table) {
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('em_employees');
    }
};
