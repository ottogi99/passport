<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    private $roles = array(
        array('seq'  => 1, 'code'  => 'master', 'name'  => '웹마스터'),
        array('seq'  => 2, 'code'  => 'admin', 'name'  => '관리자'),
        array('seq'  => 3, 'code'  => 'official', 'name'  => '시군관리자'),
        array('seq'  => 4, 'code'  => 'manager', 'name'  => '농협관리자'),
        array('seq'  => 5, 'code'  => 'nonghyup', 'name'  => '농협담당자'),
    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            foreach ($this->roles as $sigun) {
            App\Role::create([
                'seq' => $sigun['seq'],
                'code' => $sigun['code'],
                'name' => $sigun['name']
            ]);
        }
    }
}
