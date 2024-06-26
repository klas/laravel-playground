<?php

use App\Models\ActivityType;
use App\Models\DistanceUnit;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('description');
            $table->foreignIdFor(ActivityType::class);
            $table->float('distance');
            $table->foreignIdFor(DistanceUnit::class);
            $table->timestamp('start');
            $table->timestamp('finish');
            $table->integer('status');
            $table->foreignIdFor(User::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
