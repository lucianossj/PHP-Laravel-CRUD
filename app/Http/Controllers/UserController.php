<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; //importing model...

class UserController extends Controller
{
    
    public function index(){

        $users = User::all();
        $total = User::all()->count();

        return view('list-users', compact('users', 'total'));

    }

    /*public function create() {
        return view('list-users');
    }*/

    public function store(Request $request){

        $user = new User();
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->email    = $request->email;

        $user->save();

        return redirect()->route('users.index')->with('message', 'Usuário criado com sucesso!');

    }

    public function show($id){

        //

    }

    public function edit($id){
        
        $user = User::findOrFail($id);

        return view('edit-user', compact('user'));

    }

    public function update(Request $request, $id){

        $user = User::findOrFail($id);

        $user->name     = $request->name;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->email    = $request->email;

        $user->save();

        return redirect()->route('user.index')->with('message', 'Usuário alterado com sucesso!');

    }

    public function destroy($id){

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('message', 'Usuário excluído com sucesso!');
        

    }

}
