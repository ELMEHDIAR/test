<?php

use Illuminate\Database\Seeder;

class FillieresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filieres')->insert([
            [ 'nom_filiere' => "Business & Management", 'id_domaine_fk' => "1" ],
            [ 'nom_filiere' => "Sciences Sociales Et Juridiques", 'id_domaine_fk' => "2"]
        ]);
    }
}
