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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->unsignedBigInteger("role_id")->primary()->unique()->comment("管理用のIDはこちらで(連番では無く、飛ばし飛ばしにすることで扱いやすくする)→このIDを元にSecurityClearanceを制御");
            $table->string("name")->comment("役職");
            $table->string("description")->nullable()->comment("説明");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
};