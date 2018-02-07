<?php

namespace App\Http\Controllers;

use App\Newsitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\Newsitem as NewsitemResource;

class NewsitemController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {
        $userid = Auth::user()->user_type_id;
        // dd($user);
        // $users = User::all()->where('user_type_id',$user->user_type_id);
        if($userid == 1):  
            $newsitems = Newsitem::all();
            // dd($newsitems);
            return view('Newsitems.newsitems', ['newsitems' => $newsitems]);
        else:
            return redirect('/home')->with('error',"Seuls les super admins on le droit de voir les les informations des articles");
        endif;
    }

    
    public function new(){
        return view('Newsitems.newsitems-create-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'user_id' => 'required',
            'title' => 'required',
            'link' => 'required',
            'rss_feed_id' => 'required',
            'category_id' => 'required',
            'pubdate' => 'required'
          ]);

          Newsitem::create($request->all());
        //   dd($newsitem);
       
        return redirect('/home/items')->with('success',"La news a bien été ajouté");
    }

    public function show($id)
    {
        $newsitem = Newsitem::find($id);
        // dd($newsitem);                
        return view('newsitems.newsitem', compact('newsitem', 'id'));
    }

    public function edit($id)
    {
        $newsitem = Newsitem::find($id);
                        
        return view('newsitems.edit', compact('newsitem', 'id'));
    }


    public function update(Request $request, $id)
    {
        $newsitem = Newsitem::find($id);
        $this->validate(request(), [
            'user_id' => 'required',
            'title' => 'required',
            'link' => 'required',
            'rss_feed_id' => 'required',
            'category_id' => 'required',
            'pubdate' => 'required'
          ]);

        $newsitem->user_id = $request->get('user_id');
        $newsitem->title = $request->get('title');
        $newsitem->link = $request->get('link');
        $newsitem->rss_feed_id = $request->get('rss_feed_id');
        $newsitem->category_id = $request->get('category_id');
        $newsitem->pubdate = $request->get('pubdate');
        $newsitem->save();
        return redirect('/home/newsitems')->with('success',"La news a bien été modifié");

    }

    public function destroy($id)
    {
        $newsitem = Newsitem::find($id);
        $newsitem->delete();
        return redirect('/home/newsitems')->with('success',"L'utilisateur à bien été supprimer");
    }

    public function viewed($id)
    {
        $newsitem = Newsitem::find($id)->where;
    }

    //méthode pour l'api

    public function api_index()
    {
        $newsitems = Newsitem::all();

        return NewsitemResource::collection($newsitems);
    }

    public function api_show($id)
    {
        $newsitem = Newsitem::findOrFail($id);
        
        return new NewsitemResource($newsitem);

    }

    public function api_store(Request $request)
    {
        $newsitem = $request->isMethod('put') ? Newsitem::findOrFail($request->id) : new Newsitem;

        $newsitem->id = $request->input('id');
        $newsitem->user_id = $request->input('user_id');
        $newsitem->title = $request->input('title');
        $newsitem->link = $request->input('link');
        $newsitem->description = $request->input('description');
        $newsitem->rss_feed_id = $request->input('rss_feed_id');
        $newsitem->category_id = $request->input('category_id');
        $newsitem->pubdate = $request->input('pubdate');

        if($newsitem->save()):
            return new NewsitemResource($newsitem);
        endif;
    }

    public function api_destroy($id)
    {
        $newsitem = Newsitem::findOrFail($id);
        if($newsitem->delete()):        
            return new NewsitemResource($newsitem);
        endif;
    }
}
