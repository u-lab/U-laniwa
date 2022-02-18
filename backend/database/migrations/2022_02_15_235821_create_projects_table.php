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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId("representative_id")->constrained('users')->comment("代表者のユーザーid");
            $table->string("name")->comment("プロジェクト名");
            $table->string("description")->comment("説明欄");
            $table->string("thumbnail")->nullable()->comment("サムネイル用画像のパス");
            $table->string("place_of_activity")->comment("活動場所");
            $table->date("start_date")->comment("プロジェクト期間(開始)");
            $table->date("end_date")->nullable()->comment("プロジェクト期間(終了)");
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
        Schema::dropIfExists('projects');
    }
};