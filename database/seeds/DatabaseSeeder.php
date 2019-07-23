<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LikeSeeder::class);
        $this->call(RatingSeeder::class);
        $this->call(MediaSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(WallSeeder::class);
    }
}