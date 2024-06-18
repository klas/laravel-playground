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
        Schema::table('activities', function (Blueprint $table) {
            $table->foreign(['activity_type_id'], 'activity_type_rel')->references(['id'])
                ->on('activity_types')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign(['distance_unit_id'], 'distance_unit_rel')->references(['id'])
                ->on('distance_units')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ausschuettungsquote', function (Blueprint $table) {
            $table->dropForeign('bonusart_rel');
        });
    }
};
