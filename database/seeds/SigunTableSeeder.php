<?php

use Illuminate\Database\Seeder;

class SigunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Sigun::class, 30)->create();
    }
}
