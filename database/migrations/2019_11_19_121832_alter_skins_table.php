<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSkinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skins', function (Blueprint $table) {
            $table->tinyInteger('type')->default(\App\Skin::COLORS)->after('skin');
            $table->string('color')->nullable()->after('skin');
            $table->string('image')->nullable()->after('skin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skins', function (Blueprint $table) {
            $table->dropColumn(['type', 'color']);
        });
    }
}
