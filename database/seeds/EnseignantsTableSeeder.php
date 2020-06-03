<?php

use Illuminate\Database\Seeder;

class EnseignantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('enseignants')->insert([

        [

        'id' => 1,
        'nom' => 'Hassan Jikkali',
        

        ],

        [

        'id' => 2,
        'nom' => 'Massart bernard',
      
        ],



    ]);
    }
}
