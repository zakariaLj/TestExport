<?php

use Illuminate\Database\Seeder;

class Types_EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('type_events')->insert([

        [

        'id' => 1,
        'nom' => 'Cours',


        ],

        [

        'id' => 2,
        'nom' => 'Examens',

        ],



    ]);
    }
}
