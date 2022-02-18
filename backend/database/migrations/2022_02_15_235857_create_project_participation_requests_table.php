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
        Schema::create('project_participation_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId("project_id")->comment("参加リクエスト先のプロジェクトid");
            $table->foreignId("user_id")->comment("参加リクエストしたユーザーid");
            $table->string("comment")->comment("参加リクエストのコメント");
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
        Schema::dropIfExists('project_participation_requests');
    }
};
