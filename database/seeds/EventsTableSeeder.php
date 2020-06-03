
<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'id' => '1',
                'nom' => 'BIOL J102',
                'couleur_id'=> '1',
                'annee_cours_id' => '1',
            ],
            [
                'id' => '2',
                'nom' => 'CHIM J102',
                'couleur_id'=> '2',
                'annee_cours_id' => '1',
            ],
            [
                'id' => '3',
                'nom' => 'MATH F113',
                'couleur_id'=> '3',
                'annee_cours_id' => '1',
            ],
            [
                'id' => '4',
                'nom' => 'PHYS F104',
                'couleur_id'=> '4',
                'annee_cours_id' => '1',
            ],
        ]);
    }
}
