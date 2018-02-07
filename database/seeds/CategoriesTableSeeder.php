<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        for($i = 0; $i < 3; $i++):
        $categories[] = [
            'name' => str_random(10),
            'user_id' => rand(0,10),
        ];
        endfor;

        foreach($categories AS $category):
        
            Category::create($category);
        endforeach;
    }
}
