<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
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
        $user = Auth()->user();
        return view('User.profile', compact('user'));
    }
    public function profileUpdate(Request $request)
    {
        $user = auth()->user();

        // Validar entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // Actualizar nombre
        $user->name = $request->name;

        // Si hay una nueva imagen
        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($user->image) {
                \Storage::disk('public')->delete($user->image->path);
            }

            // Guardar nueva imagen en almacenamiento público
            $path = $request->file('image')->store('profile_images', 'public');

            // Actualizar o crear imagen en BD usando la relación polimórfica
            $user->image()->updateOrCreate([], ['path' => $path]);
        }

        $user->save();

        return redirect()->back()->with('update', 'ok');
    }
}
