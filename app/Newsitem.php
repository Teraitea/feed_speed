<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsitem extends Model
{
    protected $fillable = ['user_id', 'title', 'link', 'rss_feed_id',  'category_id', 'pubdate'];
}
