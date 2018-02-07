<?php

use Illuminate\Database\Seeder;
use App\Usertype;
class UsertypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userstypes = [
            [
                'name'=>'superadmin',
            ],
            [
                'name'=>'user',
            ]];

        foreach($userstypes AS $usertype):
        
            Usertype::create($usertype);
        endforeach;
    }
}
