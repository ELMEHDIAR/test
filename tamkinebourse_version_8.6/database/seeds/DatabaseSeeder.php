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
        $this->call(ArefsTableSeeder::class);
        $this->call(DirectionProvicncialesTableSeeder::class);
        $this->call(UniversitesTableSeeder::class);
        $this->call(DomainesTableSeeder::class);
        $this->call(FillieresTableSeeder::class);
    }
}
