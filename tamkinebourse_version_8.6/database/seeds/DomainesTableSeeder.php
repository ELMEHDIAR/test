<?php

use Illuminate\Database\Seeder;

class DomainesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('domaines')->insert([
            [ 'nom_domaine' => "Business & Management", 'id_universite_fk' => "1" ],
            [ 'nom_domaine' => "Sciences Sociales Et Juridiques", 'id_universite_fk' => "1"],
            [ 'nom_domaine' => "Informatique", 'id_universite_fk' => "1" ],
            [ 'nom_domaine' => "Ingénierie", 'id_universite_fk' => "1" ],
            [ 'nom_domaine' => "Medécine", 'id_universite_fk' => "2" ],
            [ 'nom_domaine' => "Architecture", 'id_universite_fk' => "2" ],
            [ 'nom_domaine' => "Executive Education", 'id_universite_fk' => "3" ],
            [ 'nom_domaine' => "École Doctorale", 'id_universite_fk' => "3" ]
        ]);
    }
}
