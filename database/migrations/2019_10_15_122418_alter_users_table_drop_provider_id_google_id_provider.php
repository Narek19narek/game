<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTableDropProviderIdGoogleIdProvider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->nullable()->change();
            $table->integer('switch')->unsigned()->default(6)->change();
            $table->dropColumn('provider_id');
            $table->dropColumn('provider');
            $table->dropColumn('google_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('switch')->unsigned()->default(3)->change();
            $table->string('password')->change();
            $table->string('google_id')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
        });
    }
}
