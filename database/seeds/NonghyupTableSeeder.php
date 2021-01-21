<?php

use Illuminate\Database\Seeder;

class NonghyupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Nonghyup::class, 30)->create();
    }
}
