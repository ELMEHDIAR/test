<?php

use Illuminate\Database\Seeder;

class DirectionProvicncialesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('directionprovinciales')->insert([

            ["nom_direction" => 'Direction provinciale de Tanger-Assilah', "id_aref_fk" => "1"],
            ["nom_direction" => 'Direction provinciale de M\'diq-Fnideq', "id_aref_fk" => "1"],
            ["nom_direction" => 'Direction provinciale de Tetouan', "id_aref_fk" => "1"],
            ["nom_direction" => 'Direction provinciale de Fahs-Anjra', "id_aref_fk" => "1"],
            ["nom_direction" => 'Direction provinciale de Larache', "id_aref_fk" => "1"],
            ["nom_direction" => 'Direction provinciale d\'Al Hoceima', "id_aref_fk" => "1"],
            ["nom_direction" => 'Direction provinciale de Chefchaouen', "id_aref_fk" => "1"],
            ["nom_direction" => 'Direction provinciale de Ouezzane', "id_aref_fk" => "1"],
            ["nom_direction" => 'Direction provinciale de Nador', "id_aref_fk" => "2"],
            ["nom_direction" => 'Direction provinciale de Driouch', "id_aref_fk" => "2"],
            ["nom_direction" => 'Direction provinciale de Jerada', "id_aref_fk" => "2"],
            ["nom_direction" => 'Direction provinciale de Berkane', "id_aref_fk" => "2"],
            ["nom_direction" => 'Direction provinciale de Taourirt', "id_aref_fk" => "2"],
            ["nom_direction" => 'Direction provinciale de Guercif', "id_aref_fk" => "2"],
            ["nom_direction" => 'Direction provinciale de Figuig', "id_aref_fk" => "2"],
            ["nom_direction" => 'Direction provinciale de Fes', "id_aref_fk" => "3"],
            ["nom_direction" => 'Direction provinciale de Taza', "id_aref_fk" => "3"],
            ["nom_direction" => 'Direction provinciale dEl Hajeb', "id_aref_fk" => "3"],
            ["nom_direction" => 'Direction provinciale dIfrane', "id_aref_fk" => "3"],
            ["nom_direction" => 'Direction provinciale de Moulay Yaacoub', "id_aref_fk" => "3"],
            ["nom_direction" => 'Direction provinciale de Sefrou', "id_aref_fk" => "3"],
            ["nom_direction" => 'Direction provinciale de Boulemane', "id_aref_fk" => "3"],
            ["nom_direction" => 'Direction provinciale de Taounate', "id_aref_fk" => "3"],
            ["nom_direction" => 'Direction provinciale de Rabat', "id_aref_fk" => "4"],
            ["nom_direction" => 'Direction provinciale de Sale', "id_aref_fk" => "4"],
            ["nom_direction" => 'Direction provinciale de Skhirate-Temara', "id_aref_fk" => "4"],
            ["nom_direction" => 'Direction provinciale de Kenitra', "id_aref_fk" => "4"],
            ["nom_direction" => 'Direction provinciale de Khemisset', "id_aref_fk" => "4"],
            ["nom_direction" => 'Direction provinciale de Sidi Kacem', "id_aref_fk" => "4"],
            ["nom_direction" => 'Direction provinciale de Sidi Slimane', "id_aref_fk" => "4"],
            ["nom_direction" => 'Direction provinciale de Beni-Mellal', "id_aref_fk" => "5"],
            ["nom_direction" => 'Direction provinciale d\'Azilal', "id_aref_fk" => "5"],
            ["nom_direction" => 'Direction provinciale de Fquih Ben Salah', "id_aref_fk" => "5"],
            ["nom_direction" => 'Direction provinciale de Khenifra', "id_aref_fk" => "5"],
            ["nom_direction" => 'Direction provinciale de Khouribga', "id_aref_fk" => "5"],
            ["nom_direction" => 'Direction provinciale de Casablanca', "id_aref_fk" => "6"],
            ["nom_direction" => 'Direction provinciale de Mohammedia', "id_aref_fk" => "6"],
            ["nom_direction" => 'Direction provinciale d\'El Jadida', "id_aref_fk" => "6"],
            ["nom_direction" => 'Direction provinciale de Nouaceur', "id_aref_fk" => "6"],
            ["nom_direction" => 'Direction provinciale de Mediouna', "id_aref_fk" => "6"],
            ["nom_direction" => 'Direction provinciale de Benslimane', "id_aref_fk" => "6"],
            ["nom_direction" => 'Direction provinciale de Berrechid', "id_aref_fk" => "6"],
            ["nom_direction" => 'Direction provinciale de Settat', "id_aref_fk" => "6"],
            ["nom_direction" => 'Direction provinciale de Sidi Bennour', "id_aref_fk" => "6"],
            ["nom_direction" => 'Direction provinciale de Marrakech', "id_aref_fk" => "7"],
            ["nom_direction" => 'Direction provinciale de Chichaoua', "id_aref_fk" => "7"],
            ["nom_direction" => 'Direction provinciale d\'Al Haouz', "id_aref_fk" => "7"],
            ["nom_direction" => 'Direction provinciale d\'El Kelaa des Sraghna', "id_aref_fk" => "7"],
            ["nom_direction" => 'Direction provinciale d\'Essaouira', "id_aref_fk" => "7"],
            ["nom_direction" => 'Direction provinciale de Rehamna', "id_aref_fk" => "7"],
            ["nom_direction" => 'Direction provinciale de Safi', "id_aref_fk" => "7"],
            ["nom_direction" => 'Direction provinciale de Youssoufia', "id_aref_fk" => "7"],
            ["nom_direction" => 'Direction provinciale d\'Errachidia', "id_aref_fk" => "8"],
            ["nom_direction" => 'Direction provinciale de Ouarzazate', "id_aref_fk" => "8"],
            ["nom_direction" => 'Direction provinciale de Midelt', "id_aref_fk" => "8"],
            ["nom_direction" => 'Direction provinciale de Tinghir', "id_aref_fk" => "8"],
            ["nom_direction" => 'Direction provinciale de Zagora', "id_aref_fk" => "8"],
            ["nom_direction" => 'Direction provinciale d\'Agadir Ida-Outanane', "id_aref_fk" => "9"],
            ["nom_direction" => 'Direction provinciale d\'Inezgane-Ait Melloul', "id_aref_fk" => "9"],
            ["nom_direction" => 'Direction provinciale de Chtouka-Ait Baha', "id_aref_fk" => "9"],
            ["nom_direction" => 'Direction provinciale de Taroudant', "id_aref_fk" => "9"],
            ["nom_direction" => 'Direction provinciale de Tiznit', "id_aref_fk" => "9"],
            ["nom_direction" => 'Direction provinciale de Tata', "id_aref_fk" => "9"],
            ["nom_direction" => 'Direction provinciale de Guelmim ', "id_aref_fk" => "10"],
            ["nom_direction" => 'Direction provinciale d\'Assa-Zag', "id_aref_fk" => "10"],
            ["nom_direction" => 'Direction provinciale de Tan-Tan', "id_aref_fk" => "10"],
            ["nom_direction" => 'Direction provinciale de Sidi Ifni', "id_aref_fk" => "10"],
            ["nom_direction" => 'Direction provinciale de Laayoune', "id_aref_fk" => "11"],
            ["nom_direction" => 'Direction provinciale de Boujdour', "id_aref_fk" => "11"],
            ["nom_direction" => 'Direction provinciale de Tarfaya', "id_aref_fk" => "11"],
            ["nom_direction" => 'Direction provinciale d\'Es-Semara', "id_aref_fk" => "11"],
            ["nom_direction" => 'Direction provinciale d\'Oued Ed-Dahab', "id_aref_fk" => "11"],
            ["nom_direction" => 'Direction provinciale d\'Aousserd', "id_aref_fk" => "12"]

        ]);
    }
}
