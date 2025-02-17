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
    public function destroy($id){
        $user = User::find($id);
        $user -> delete();
        return redirect()->route('user.login');
    }
}
