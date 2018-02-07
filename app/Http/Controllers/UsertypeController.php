<?php

namespace App\Http\Controllers;

use App\Usertype;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\Userstype as UserstypeResource;

class UsertypeController extends Controller
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
            $usertypes = Userstype::all();
            return view('Usertype.usertypes', ['usertypes' => $usertypes]);
        else:
            return redirect('/home')->with('error',"Seuls les super admins on le droit de voir les informations des utilisateurs");
        endif;

    }

    public function new(){
        return view('Usertype.usertypes-create-form');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
          ]);

          Userstype::create($request->all());
        //   dd($newsitem);
       
        return redirect('/home/userstypes')->with('success',"Le type d'utilisateur a été ajouté");
    }
    
    public function edit($id)
    {
        $userstypes = Userstype::find($id);
                        
        return view('Usertype.edit', compact('userstypes', 'id'));
    }


    public function update(Request $request, $id)
    {
        $userstype = Userstype::find($id);
        $this->validate(request(), [
            'name' => 'required',
          ]);

        $userstype->name = $request->get('name');
        $userstype->save();
        return redirect('/home/userstypes')->with('success',"Le type d'utilisateur a bien été modifié");

    }

    public function show($id)
    {
        $userstype = Userstype::find($id);
        return view('Usertype.userstype', compact('userstype', 'id'));
    }

    public function destroy($id)
    {
        $userstype = Userstype::find($id);
        $userstype->delete();
        return redirect('/home/userstypes')->with('success',"Le type utilisateur à bien été supprimer");
    

    }
    // méthode pour l'api
    
    public function api_index()
    {
        $userstypes = Userstype::all();

        return UserstypeResource::collection($userstypes);
    }

    public function api_show($id)
    {
        $userstype = Userstype::findOrFail($id);
        
        return new UserstypeResource($userstype);

    }

    public function api_store(Request $request)
    {
        $userstype = $request->isMethod('put') ? Userstype::findOrFail($request->id) : new Userstype;

        $userstype->id = $request->input('id');
        $userstype->name = $request->input('name');

        if($userstype->save()):
            return new UserstypeResource($userstype);
        endif;
    }

    public function api_destroy($id)
    {
        $userstype = Userstype::findOrFail($id);
        if($userstype->delete()):        
            return new UserstypeResource($userstype);
        endif;
    }
}
