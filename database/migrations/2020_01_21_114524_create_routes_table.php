<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('group_id')->nullable();
            $table->string('title');
            $table->unsignedInteger('grade_id')->nullable();
            $table->unsignedInteger('author_id')->nullable();
            $table->boolean('easier');
            $table->string('color', 7);
            $table->text('marks')->nullable();
            $table->timestamps();
        });

        Schema::table('routes', function (Blueprint $table) {
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
