<?php

use Illuminate\Database\Seeder;

class LocalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('locals')->insert([

        [

        'id' => 1,
        'nom' => 'Forum A',
        'commentaire' => 'local'

        ],

        [

        'id' => 2,
        'nom' => 'Forum B',
        'commentaire' => 'local'
        ],



        ]);
    }
}
