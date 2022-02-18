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
        Schema::create('user_timelines', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->cascadeOnDelete()->comment("該当ユーザーid");
            $table->string("title")->comment("タイトル");
            $table->string("description")->comment("説明");
            $table->tinyInteger("genre")->comment("Enumジャンル");
            $table->date("start_date")->comment("開始日(必須)");
            $table->date("end_date")->nullable()->comment("終了日(必須でない)");
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
        Schema::dropIfExists('user_timelines');
    }
};