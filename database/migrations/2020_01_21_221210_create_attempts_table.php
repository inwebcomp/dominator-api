<?php

use App\Attempt;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttemptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attempts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('route_id');
            $table->unsignedInteger('user_id');
            $table->tinyInteger('type')->default(Attempt::TRY);
            $table->text('comment')->nullable();
            $table->timestamps();
        });

        Schema::table('attempts', function (Blueprint $table) {
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attempts');
    }
}
