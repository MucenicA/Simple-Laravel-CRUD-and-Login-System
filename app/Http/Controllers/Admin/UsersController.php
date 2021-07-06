<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Gate;


class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
     

    
    public function index()
    {
        $users = User::all();
       return view('admin.users.index')->with('users', $users);
    }

   


   
    public function edit(User $user)
    {

        if(Gate::denies('edit-users')){
            return redirect(route('admin.users.index'));

        }
        $roles = Role::all();

        return view('admin.users.edit')->with([
            'user'=>$user,
            'roles'=>$roles
        ]);
    }

    
    public function update(Request $request, User $user)
    {
       $user->roles()->sync($request->roles);

       return redirect()->route('admin.users.index');
    }

   
    public function destroy(User $user)
    {
        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });
        
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
