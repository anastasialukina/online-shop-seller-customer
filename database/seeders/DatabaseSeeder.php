<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            //uncomment the seeder you want to run and don't forget to run php artisan db:seed
            //comment the seeder if your db is already seeded
            //UserSeeder::class,
            //ProductSeeder::class,
        ]);
    }
}
