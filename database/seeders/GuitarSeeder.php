<?php

namespace Database\Seeders;

use App\Models\Guitar;
use Illuminate\Database\Seeder;

class GuitarSeeder extends Seeder
{
    protected $model = Guitar::class;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guitar::factory()->count(20)->create();
    }
}
