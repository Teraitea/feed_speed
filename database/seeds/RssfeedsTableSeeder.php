<?php

use Illuminate\Database\Seeder;
use App\Rssfeed;

class RssfeedsTableSeeder extends Seeder
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
                'name'=>'maxburstein',
                'rss_feed_link'=>"http://maxburstein.com/rss",
                'user_id'=>'1',
                'category_id'=>'1',
            ],
            [
                'name'=>'maxburstein',
                'rss_feed_link'=>"http://www.engadget.com/rss.xml",
                'user_id'=>'1',
                'category_id'=>'1',
            ],
            [
                'name'=>'maxburstein',
                'rss_feed_link'=>"http://www.reddit.com/r/programming/.rss",
                'user_id'=>'1',
                'category_id'=>'1',
            ]
        ];

        foreach($rssFeeds as $rssFeed):
            RssFeed::create($rssFeed);
        endforeach;
    }
}
