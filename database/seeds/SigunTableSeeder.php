<?php

use Illuminate\Database\Seeder;

class SigunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     factory(App\Sigun::class, 30)->create();
    // }

    private $siguns = array(
        array('seq'  => 1, 'code'  => 'cnca', 'name'  => '천안시'),
        array('seq'  => 2, 'code'  => 'cngj', 'name'  => '공주시'),
        array('seq'  => 3, 'code'  => 'cnbr', 'name'  => '보령시'),
        array('seq'  => 4, 'code'  => 'cnas', 'name'  => '아산시'),
        array('seq'  => 5, 'code'  => 'cnss', 'name'  => '서산시'),
        array('seq'  => 6, 'code'  => 'cnns', 'name'  => '논산시'),
        array('seq'  => 7, 'code'  => 'cndj', 'name'  => '당진시'),
        array('seq'  => 8, 'code'  => 'cngs', 'name'  => '금산군'),
        array('seq'  => 9, 'code'  => 'cnby', 'name'  => '부여군'),
        array('seq'  => 10, 'code'  => 'cnsc', 'name'  => '서천군'),
        array('seq'  => 11, 'code'  => 'cncy', 'name'  => '청양군'),
        array('seq'  => 12, 'code'  => 'cnhs', 'name'  => '홍성군'),
        array('seq'  => 13, 'code'  => 'cnys', 'name'  => '예산군'),
        array('seq'  => 14, 'code'  => 'cnta', 'name'  => '태안군'),
    );

    public function run()
    {
        foreach ($this->siguns as $sigun) {
            App\Sigun::create([
                'seq' => $sigun['seq'],
                'code' => $sigun['code'],
                'name' => $sigun['name']
            ]);
        }
    }
}
