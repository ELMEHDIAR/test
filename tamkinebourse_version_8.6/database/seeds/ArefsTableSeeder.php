<?php

use Illuminate\Database\Seeder;

class ArefsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('arefs')->insert([
            [ 'nom_aref' => "Tanger-Tetouan-Al Hoceima" ],
            [ 'nom_aref' => "Oriental" ],
            [ 'nom_aref' => "Fes-Meknes" ],
            [ 'nom_aref' => "Rabat-Sale-Kenitra" ],
            [ 'nom_aref' => "Beni Mellal-Khenifra" ],
            [ 'nom_aref' => "Casablanca-Settat" ],
            [ 'nom_aref' => "Marrakech-Safi" ],
            [ 'nom_aref' => "Draa-Tafilalet" ],
            [ 'nom_aref' => "Souss-Massa" ],
            [ 'nom_aref' => "Guelmim-Oued Noun" ],
            [ 'nom_aref' => "Laayoune-Sakia El Hamra" ],
            [ 'nom_aref' => "Dakhla-Oued Ed-Dahab" ]
        ]);
    }
}
