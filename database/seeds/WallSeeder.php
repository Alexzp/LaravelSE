<?php

use App\Models\Wall;
use Illuminate\Database\Seeder;

class WallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Wall::class, 10)->create();
    }
}