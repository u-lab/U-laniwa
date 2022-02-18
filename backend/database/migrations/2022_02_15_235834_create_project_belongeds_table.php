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
        Schema::create('project_belongeds', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->comment("参加ユーザー");
            $table->foreignId("project_id")->comment("参加プロジェクト先");
            $table->timestamps(); //参加日とか参照するため

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_belongeds');
    }
};