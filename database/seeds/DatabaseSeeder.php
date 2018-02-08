<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(NewsitemsTableSeeder::class);
        $this->call(UsertypesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        // $this->call(RssfeedsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
