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
        Schema::create('user_belonged_organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->comment("ユーザーid");
            $table->string("name")->comment("資格名");
            $table->string("description")->comment("説明欄");
            $table->date("start_date")->comment("参加期間(開始)");
            $table->date("end_date")->nullable()->comment("参加期間(終了)");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_belonged_organizations');
    }
};