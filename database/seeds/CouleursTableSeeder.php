<?php

use Illuminate\Database\Seeder;

class CouleursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('couleurs')->insert([
            [
                'id'=> '1',
                'nom' => 'ROUGE',
                'code_Hexa' => '#CC3333',
            ],
            [
                'id'=> '2',
                'nom' => 'BLEU',
                'code_Hexa' => '#3300FF',

            ],
            [
                'id'=> '3',
                'nom' => 'VERT',
                'code_Hexa' => '#669933',

            ],
            [
                'id'=> '4',
                'nom' => 'JAUNE',
                'code_Hexa' => '#66FF33',

            ],

        ]);
    }
}
