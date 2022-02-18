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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            /**
             * ここから独自定義
             */
            $table->foreignId('user_role_id')->comment('ユーザー権限(対象の主キーはrole_id)');
            $table->unsignedBigInteger('invited_id')->nullable()->comment('紹介者id'); //ホントはnullableにしたくなが、創始者がどうやっても外部キーエラーになるので、null可に
            $table->date('retired_at')->nullable()->comment('退部した日'); //退部後n日で垢削除の仕組み用。退部の判定自体はuser_rankを見る

            $table->softDeletes();
            $table->timestamps();


            //invitedをnullableにした都合でforeignIdだと事故るので
            $table->foreign('invited_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};