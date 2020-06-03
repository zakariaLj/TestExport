<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Annee_CoursTableSeeder::class);
        $this->call(QuadrimestresTableSeeder::class);
        $this->call(LocalsTableSeeder::class);
        $this->call(EnseignantsTableSeeder::class);
        $this->call(Types_EventsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(CouleursTableSeeder::class);
    }
}
