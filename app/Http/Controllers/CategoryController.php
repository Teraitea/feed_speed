<?php

namespace App\Http\Controllers;

use App\User;
Use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $userid = Auth::user()->user_type_id;
        if($userid == 1):  
            $categorys = Category::all();
            // dd($categorys);
            return view('categorys.categorys', ['categorys' => $categorys]);
        else:
            return redirect('/home')->with('error',"Seuls les super admins on le droit de modifier les catégories");
        endif;
    }

    public function new()
    {
        return view('categorys.categorys-create-form');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'user_id' => 'required|numeric',
          ]);

          Category::create($request->all());
        //   dd($newsitem);
       
        return redirect('/home/categorys')->with('success',"La catégorie a bien été ajouté");
  
    }

    public function show($id)
    {
        $category = Category::find($id);
                        
        return view('categorys.category', compact('category', 'id'));
    }

    public function edit($id)
    {
        $categorys = Category::find($id);
                        
        return view('categorys.edit', compact('categorys', 'id'));

    }

    public function update(Request $request, $id)
    {

        $categorys = Category::find($id);
        $this->validate(request(), [
            'name' => 'required',
          ]);

        $categorys->name = $request->get('name');
        $categorys->save();
        return redirect('/home/categorys')->with('success',"La catégorie a bien été modifié");

    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/home/categorys')->with('success',"La catégorie à bien été supprimer");
    }

    // Méthodes pour l'API

    public function api_index()
    {
        $categories = Category::all();

        return CategoryResource::collection($categories);
    }

    public function api_show($id)
    {
        $category = Category::findOrFail($id);
        
        return new CategoryResource($category);

    }

    public function api_store(Request $request)
    {
        $category = $request->isMethod('put') ? Category::findOrFail($request->id) : new Category;

        $category->id = $request->input('id');
        $category->name = $request->input('name');
        $category->user_id = $request->input('user_id');

        if($category->save()):
            return new CategoryResource($category);
        endif;
    }

    public function api_destroy($id)
    {
        $category = Category::findOrFail($id);
        if($category->delete()):        
            return new CategoryResource($category);
        endif;
    }
}
