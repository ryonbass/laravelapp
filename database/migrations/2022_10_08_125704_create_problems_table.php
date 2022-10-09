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
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->integer('problem_id');
            $table->string('title');
            $table->string('difficulty');
            $table->string('my_code');
            $table->string('ex_code')->nullable();
            $table->string('overview');
            $table->string('exam1')->nullable();
            $table->string('exam2')->nullable();
            $table->string('exam3')->nullable();
            $table->string('url');
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
        Schema::dropIfExists('problems');
    }
};
