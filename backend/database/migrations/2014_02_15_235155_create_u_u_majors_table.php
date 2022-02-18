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
        Schema::create('u_u_majors', function (Blueprint $table) {
            $table->id();
            $table->string("name")->comment("学科");
            $table->foreignId("faculty_id")->constrained('u_u_faculties')->comment("学部とつなげる");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('u_u_majors');
    }
};