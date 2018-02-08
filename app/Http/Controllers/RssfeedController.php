<?php

namespace App\Http\Controllers;

use App\Rssfeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\Rssfeed as RssFeedResource;

class RssfeedController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {

    }
    

    public function new()
    {
        $userid = Auth::user()->id;
        // dd($userid);
        return view('rssfeeds.rssfeeds-create-form', ['userid' => $userid]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'rss_feed_link' => 'required',
            'user_id' => 'required',
          ]);

          Rssfeed::create($request->all());
        //   dd($newsitem);
        
        return redirect('/home')->with('success',"Le flux a bien été ajouté");
    }

    public function viewed()
    {
        
    }

    //méthode pour l'api

    public function api_index()
    {
        $rssfeeds = Rssfeed::all();

        return RssfeedResource::collection($rssfeeds);
    }// méthodes pour l'api
    
        
    public function api_show($id)
    {
        $rssfeed = Rssfeed::findOrFail($id);

        return new RssfeedResource($rssfeed);
    }
    
    public function api_store(Request $request)
    {
        $rssfeed = $request->isMethod('put') ? RssFeed::findOrFail($request->id) : new RssFeed;

        $rssfeed->id = $request->input('id');
        $rssfeed->name = $request->input('name');
        $rssfeed->user_id = $request->input('user_id');
        $rssfeed->rss_feed_link = $request->input('rss_feed_link');

        if($rssfeed->save()):
            return new RssFeedResource($rssfeed);
        endif;
    }  
    
    public function api_destroy($id)
    {
        $rssfeed = RssFeed::findOrFail($id);
        if($rssfeed->delete()):
           return new RssFeedResource($rssfeed);
        endif;
    }
}
