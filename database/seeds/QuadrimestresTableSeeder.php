<?php

use Illuminate\Database\Seeder;

class QuadrimestresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quadrimestres')->insert([

            [

                'id' => 1,
                'nom' => 'Premier Quadrimestre',
                'date_debut' => '2020-09-14',
                'date_fin' => '2020-12-21',

            ],

            [

                'id' => 2,
                'nom' => 'Deuxiemes Quadrimestre',
                'date_debut' => '2021-01-18',
                'date_fin' => '2021-05-17',
            ],

           

        ]);
    }
}
