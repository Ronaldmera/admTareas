<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(){
     return view('task.create');
    }
    public function store(Request $request){
        $task = new Task();
        $task->user_id = auth()->id(); // Obtiene el ID del usuario autenticado
        $task -> title = $request -> title;
        $task -> content = $request -> content;
        $task -> save();
        return  view('task.create');
    }
}
