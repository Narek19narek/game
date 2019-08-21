<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('skeen_id')->unsigned()->nullable();
            $table->integer('level')->unsigned()->default(1);
            $table->integer('switch')->unsigned()->default(3);
            $table->integer('teleport')->unsigned()->default(3);
            $table->integer('push')->unsigned()->default(3);
            $table->bigInteger('coins')->unsigned()->default(100);
//            $table->bigInteger('wallet_id')->nullable();
            $table->string('total_time')->nullable();
            $table->integer('total_points')->unsigned()->default(0);
            $table->integer('game_count')->unsigned()->nullable();
            $table->boolean('cookies')->default(false);
            $table->rememberToken();
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
}
