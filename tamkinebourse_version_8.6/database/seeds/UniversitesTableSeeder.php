<?php

use Illuminate\Database\Seeder;

class UniversitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universites')->insert([
            [ 'nom_universite' => "Université Internationale de Rabat" ],
            [ 'nom_universite' => "Université Euro-Méditerranéenne de Fès" ],
            [ 'nom_universite' => "Université Al Akhawayn" ]
        ]);
    }
}
