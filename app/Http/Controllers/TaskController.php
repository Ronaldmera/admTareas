<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){//obtiene todas las tareas y las pagina en 10
        $user = auth()->user(); // Obtener el usuario autenticado

        $tasksTotal = Task::where('user_id', $user->id)->count();
        $tasks = Task::where('user_id',$user->id)->paginate(10);
        $tasksShown = ($tasks->currentPage() - 1) * $tasks->perPage() + $tasks->count(); // Calcula tareas mostradas hasta la página actual

        return view('task.list', compact('tasks','tasksTotal', 'tasksShown'));
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
