<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Newsitem;
use Carbon\Carbon;

class Rssfeed extends Model
{
    protected $fillable = ['name', 'user_id', 'rss_feed_link'];

    public static function getMyRssFeed(){
        $user = Auth::user();
        $rssFeeds = Rssfeed::all()->where('user_id',$user->id);
        
        return $rssFeeds;
    }

    public static function retreiveNewsFromMyRssFeed()
    {
        $user = Auth::user();
        $entries = array();
        $feeds = Rssfeed::getMyRssFeed();
        
        foreach($feeds as $feed) 
        {
            $xml = simplexml_load_file($feed->rss_feed_link);
            foreach($xml->xpath("//item") as $item):
                $carbon = new Carbon($item->pubDate);
                $carbon->format('Y-m-d H:i:s');
                // dump($xml);
                $newsitem = New Newsitem();
                $newsitem->user_id = $user->id;
                $newsitem->title =$item->title;
                $newsitem->description =htmlspecialchars_decode($item->description);
                $newsitem->link =$item->link ;
                $newsitem->rss_feed_id = $feed->id;
                $newsitem->category_id = 1;
                $newsitem->pubdate =$carbon;
                $newsitem->save();
                // dd($newsitem);
            endforeach;
        }

    }
}

