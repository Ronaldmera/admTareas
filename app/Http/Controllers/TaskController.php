<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){//obtiene todas las tareas
        $tasks = Task::all();
        return view('task.list', compact('tasks'));
    }
    public function create(){
     return view('task.create');
    }
    public function store(Request $request){
        $task = new Task();
        $task->user_id = auth()->id(); // Obtiene el ID del usuario autenticado
        $task -> title = $request -> title;
        $task -> content = $request -> content;
        $task -> status = $request -> status;
        $task -> save();
        return  view('task.create');
    }

    public function show($id){


    }
    public function update(){


    }
    public function destroy($id){
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('task.index')->with('delete','ok');
    }
}
