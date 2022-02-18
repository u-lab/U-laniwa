<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_invite_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->unique()->cascadeOnDelete()->comment("ユーザーid");
            $table->string("code")->unique()->comment("招待コード");
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
        Schema::dropIfExists('user_invite_codes');
    }
};