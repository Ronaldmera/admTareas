<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('user.create');
    }
    public function store(request $request){
        $user = new User();
        $user -> name = $request-> name;
        $user -> email = $request-> email;
        $user -> password = $request-> password;
        $user-> save();
        return redirect()->route('user.login');
    }
    public function edit($id){
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }
    public function update(Request $request, $id){
        $user = User::find($id);
        $user ->name = $request->name;
        $user ->password = $request->password;
        $user->save();
        return redirect()->route('dashboard');
    }
    public function destroy($id){
        $user = User::find($id);
        $user -> delete();
        //al usuario borrar el perfil el valor será 'ok' y en la vista 'user.login' se comprueba el valor atravez de in if y se carga la animacion de borrado exitoso
        return redirect()->route('user.login')-> with('eliminar','ok');
    }
    public function showProfile(){
        return view('User.profile');
    }
}
