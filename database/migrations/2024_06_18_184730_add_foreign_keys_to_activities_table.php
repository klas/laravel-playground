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
            $table->foreign(['user_id'], 'user_rel')->references(['id'])
                ->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropForeign('activity_type_rel');
            $table->dropForeign('distance_unit_rel');
            $table->dropForeign('user_rel');
        });
    }
};
