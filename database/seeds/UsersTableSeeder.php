<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rssFeeds = [
            [
                'firstname'=>'SuperAdmin',
                'lastname'=>'Admin',
                'email'=>'teraitea.tarihaa@hotmail.fr',
                'password'=>bcrypt("teraitea"),
                'user_type_id'=>'1',
            ], [
                'firstname'=>'Sabrina',
                'lastname'=>'Sabrina',
                'email'=>'sabrina@cnampf.com',
                'password'=>bcrypt("sabrina"),
                'user_type_id'=>'2',
            ]];

            foreach($rssFeeds as $rssFeed):
                User::create($rssFeed);
            endforeach;
    }
}
