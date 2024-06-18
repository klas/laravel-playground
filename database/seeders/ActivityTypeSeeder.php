<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ActivityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('activity_types')->upsert(
            [
                ['name' => Str::random(10)],
                ['name' => Str::random(10)],
                ['name' => Str::random(10)],
                ['name' => Str::random(10)],
            ],
            ['name']

        );
    }
}
