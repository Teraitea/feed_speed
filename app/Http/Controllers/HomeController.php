<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\RssFeed;
use App\Newsitem;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->user_type_id == 2):
            Rssfeed::retreiveNewsFromMyRssFeed();
            $newsitems = Newsitem::where([
                ['user_id',$user->id],
                ['viewed','0'],
            ])->get();
            // dd($newsitems);
            return view('newsitems.newsitems',['newsitems'=>$newsitems]);
        endif;
        
        return view('home');
    }

}