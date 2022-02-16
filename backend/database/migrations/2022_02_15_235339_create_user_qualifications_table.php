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
        Schema::create('user_qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->comment("ユーザーid");
            $table->string("name")->comment("資格名");
            $table->string("description")->nullable()->comment("説明欄");
            $table->date("date_of_acquisition")->comment("取得日");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_qualifications');
    }
};