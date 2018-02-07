<?php

use Illuminate\Database\Seeder;
use App\Newsitem;

class NewsitemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newsitems = [];
        for($i = 0; $i < 5; $i++):
            $rss_feed_id = rand(1, 10);
            $product_categorie_id = rand(1,2);
            $date='2018-'.'01-'.rand(10,31);
            $time='0'.rand(1,9).':'.rand(10,59).':'.rand(10,59);
            $pubdate=$date.' '.$time;
        $newsitems[] = [
            'user_id' => rand(0,2),
            'title' => str_random(10),
            'description' => str_random(10),
            'link' => str_random(10).'.rss',
            'rss_feed_id'=> $rss_feed_id,
            'category_id' => $rss_feed_id,
            'pubdate' => $pubdate,
        ];
        endfor;

        foreach($newsitems AS $newsitem):
        
            Newsitem::create($newsitem);
        endforeach;
        //
    }
}
