<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    public function index(){//obtiene todas las tareas y las pagina en 10
        $user = auth()->user(); // Obtener el usuario autenticado

        $tasksTotal = Task::where('user_id', $user->id)->count();
        $tasks = Task::where('user_id',$user->id)->orderBy('created_at','desc')->paginate(10);
        $tasksShown = ($tasks->currentPage() - 1) * $tasks->perPage() + $tasks->count(); // Calcula tareas mostradas hasta la página actual
        $taskShow = null; // Definir por defecto

        return view('task.list', compact('tasks','tasksTotal', 'tasksShown','taskShow'));
    }
    public function store(Request $request){
        $task = new Task();
        $task->user_id = auth()->id(); // Obtiene el ID del usuario autenticado
        $task -> title = Str::ucfirst($request -> title);//convierte la primera letra en maytuscula
        $task -> content =Str::ucfirst( $request -> content);
        $task -> status = $request -> status;
        $task -> save();
        return redirect()->route('task.index')->with('save','ok');
    }

    public function show($id)
    {
        $task = Task::find($id);
        // if (!$task) {
        //     return response()->json(['message' => 'Tarea no encontrada'], 404);
        // }
        return response()->json($task);
    }
    public function edit($id){
        $task = Task::find($id);
        return response()->json($task);

    }
    public function update(Request $request,$id){
        $task = Task::find($id);
        $task -> title = Str::ucfirst($request -> title);
        $task -> content =Str::ucfirst( $request -> content);
        $task -> status = $request -> status;
        $task -> save();
        return redirect()->back()->with('update', 'ok');
      }
    public function destroy(Request $request, $id) {
        $task = Task::find($id);
        $task->delete();

        return redirect()->back()->with('delete', 'ok'); // Regresa a la misma página
    }

}
