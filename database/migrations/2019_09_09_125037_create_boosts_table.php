<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boosts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('name', ['switch', 'teleport', 'push']);
            $table->enum('amount', ['3', '10', '25', '100']);
            $table->enum('duration', ['1', '3', '24']);
            $table->integer('coin')->default(0);
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
        Schema::dropIfExists('boosts');
    }
}
