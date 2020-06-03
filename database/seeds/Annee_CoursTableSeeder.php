<?php

use Illuminate\Database\Seeder;

class Annee_CoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('annee_cours')->insert([
            [
                'id' => 1,

                'nom' => 'BA1',
            ],

            [
                'id' => 2,

                'nom' => 'BA2',
            ],

            [
                'id' => 3,

                'nom' => 'BA3',
            ],

            [
                'id' => 4,

                'nom' => 'MA1',
            ],

            [
                'id' => 5,

                'nom' => 'MA2',
            ],
        ]);


    }
}
