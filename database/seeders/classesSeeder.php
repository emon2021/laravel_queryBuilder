<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\classes;

class classesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        classes::factory()->count(10)->create();
    }
}
