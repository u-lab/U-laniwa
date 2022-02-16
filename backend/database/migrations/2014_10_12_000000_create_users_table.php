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
            //deleted_atがほしい
            $table->date('last_accessed_at')->nullable();
            $table->date('birth_day')->comment('誕生日');
            $table->date('retired_at')->nullable()->comment('退部した日'); //退部後n日で垢削除の仕組み用。退部の判定自体はuser_rankを見る
            $table->string('last_name')->nullable()->comment('姓'); //nullableなのは姓が存在しない国出身の人対応のため
            $table->string('first_name')->comment('名');
            $table->text('description')->nullable()->comment('自己紹介');
            $table->foreignId('user_role_id')->comment('ユーザー権限(対象の主キーはrole_id)');
            $table->foreignId('grade_id')->comment('学年');
            $table->boolean('is_udai')->nullable()->comment('宇大かそうでないか');
            $table->json('university_meta')->nullable()->comment('大学情報');
            $table->foreignId('faculty_id')->nullable()->comment('学部情報');
            $table->foreignId('major_id')->nullable()->comment('学部情報');
            $table->foreignId('gender_id')->comment('性別情報');
            $table->foreignId('lived_country_id')->constrained('countries')->comment('現住国情報');
            $table->foreignId('lived_prefecture_id')->constrained('prefectures')->nullable()->comment('現住都道府県情報');
            $table->foreignId('lived_municipality_id')->constrained('municipalities')->nullable()->comment('現住市区町村情報');
            $table->foreignId('birth_country_id')->constrained('countries')->comment('現住国情報');
            $table->foreignId('birth_prefecture_id')->constrained('prefectures')->nullable()->comment('現住都道府県情報');
            $table->foreignId('birth_municipality_id')->constrained('municipalities')->nullable()->comment('現住市区町村情報');
            $table->foreignId('invited_id')->constrained('users')->comment('紹介者id');
            $table->boolean('is_publish_birth_day')->comment('誕生日公開するか？');
            $table->boolean('is_graduate')->comment('卒業したか？');
            $table->string('status')->comment('ひとこと(GitHubのstatusと同じ)');
            $table->string('github_id')->nullable()->comment('GitHubのid');
            $table->string('line_name')->nullable()->comment('LINEでのユーザー名');
            $table->string('slack_name')->nullable()->comment('Slackでのユーザー名');
            $table->string('discord_name')->nullable()->comment('Discordでのユーザー名');
            $table->string('hobbies')->nullable()->comment('趣味');
            $table->string('interests')->nullable()->comment('興味');
            $table->string('languages')->nullable()->comment('言語');
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
        Schema::dropIfExists('users');
    }
};