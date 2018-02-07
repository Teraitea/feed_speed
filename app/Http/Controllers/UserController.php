<?php

namespace App\Http\Controllers;

use App\User;
use App\Newsitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {

        $userid = Auth::user()->user_type_id;
        dd($userid);
        // dd($userid);
        // $users = User::all()->where('user_type_id',$user->user_type_id);
        if($userid == 1):  
            // dd($userid);      
        $users = User::all();
        return view('users.users', ['users' => $users]);
        else:
            return redirect('/home')->with('error',"Seuls les super admins on le droit de voir les informations des utilisateurs");
        endif;
        
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $user = User::find($id);
                        
        return view('users.user', compact('user', 'id'));
    }


    public function edit($id)
    {
        $user = User::find($id);
                        
        return view('users.edit', compact('user', 'id'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate(request(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'user_type_id' => 'required|numeric',
          ]);

        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->user_type_id = $request->get('user_type_id');
        $user->save();

        return redirect('/home/users')->with('success',"L'utilisateur à bien été modifié");

    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/home/users')->with('success',"L'utilisateur à bien été supprimé");
    }

    // méthodes pour l'api
    
    public function api_index()
    {
        $users = User::all();

        return UserResource::collection($users);
    }  
    
    public function api_show($id)
    {
        $user = User::findOrFail($id);

        return new UserResource($user);
    }
    
    public function api_store(Request $request)
    {
        $user = $request->isMethod('put') ? User::findOrFail($request->id) : new User;

        $user->id = $request->input('id');
        $user->lastname = $request->input('lastname');
        $user->firstname = $request->input('firstname');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->user_type_id = $request->input('user_type_id');

        if($user->save()):
            return new UserResource($user);
        endif;
    }  
    
    public function api_destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->delete()):
           return new UserResource($user);
        endif;
    }
}
