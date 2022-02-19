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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete()->comment('該当ユーザーのid');
            $table->date('birth_day')->comment('誕生日');
            $table->string('last_name')->nullable()->comment('姓'); //nullableなのは姓が存在しない国出身の人対応のため
            $table->string('first_name')->comment('名');
            $table->text('description')->nullable()->comment('自己紹介');
            $table->unsignedTinyInteger('grade')->comment('enum学年');
            $table->boolean('is_udai')->comment('宇大かそうでないか');
            $table->json('university_meta')->nullable()->constrained()->comment('大学情報');
            $table->foreignId('faculty_id')->nullable()->constrained('u_u_faculties')->comment('学部情報');
            $table->foreignId('major_id')->nullable()->constrained('u_u_majors')->comment('学部情報');
            $table->unsignedTinyInteger('gender')->comment('enum性別');
            $table->foreignId('lived_area_id')->constrained('areas')->comment('現住地域');
            $table->foreignId('birth_area_id')->constrained('areas')->comment('出身地域');
            $table->boolean('is_dark_mode')->comment('ダークモードにするか？');
            $table->boolean('is_publish_birth_day')->comment('誕生日公開するか？');
            $table->boolean('is_graduate')->comment('卒業したか？');
            $table->string('status')->comment('ひとこと(GitHubのstatusと同じ)');
            $table->string('github_id')->nullable()->comment('GitHubのid');
            $table->string('line_name')->nullable()->comment('LINEでのユーザー名');
            $table->string('slack_name')->nullable()->comment('Slackでのユーザー名');
            $table->string('discord_name')->nullable()->comment('Discordでのユーザー名');
            $table->string('hobbies')->nullable()->comment('趣味');
            $table->string('interests')->nullable()->comment('興味');
            $table->string('motto')->nullable()->comment('座右の銘');

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
        Schema::dropIfExists('user_infos');
    }
};