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
            //nullableなのは姓が存在しない国出身の人対応のため
            $table->string('last_name')->nullable()->comment('姓');
            $table->string('first_name')->comment('名');
            $table->unsignedTinyInteger('grade')->comment('enum学年');
            /**下記3つのどれかが必ず入る。でも他2つが入らないので仕様上nullable */
            $table->foreignId('u_u_major_id')->nullable()->constrained('u_u_majors')->comment('宇大の学部学科情報');
            $table->json('university_meta')->nullable()->constrained()->comment('大学情報');
            $table->json('company_meta')->nullable()->constrained()->comment('企業情報');
            $table->unsignedTinyInteger('gender')->comment('enum性別');
            $table->foreignId('live_area_id')->constrained('areas')->comment('現住地域');
            $table->foreignId('birth_area_id')->constrained('areas')->comment('出身地域');
            /**フラグ群 デフォルト値付き */
            $table->boolean('is_dark_mode')->default(false)->comment('ダークモードにするか？');
            $table->boolean('is_publish_birth_day')->default(true)->comment('誕生日公開するか？');
            $table->text('description')->nullable()->comment('自己紹介');
            /**nullable群 */
            $table->string('group_affiliation')->nullable()->comment('所属団体');
            $table->string('status')->nullable()->comment('ひとこと(GitHubのstatusと同じ)');
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