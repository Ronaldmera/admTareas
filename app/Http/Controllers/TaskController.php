<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user(); // Obtener el usuario autenticado
        $taskId = $request->query('id'); // Obtener el ID de la tarea seleccionada
        $taskShow = null; // Inicializar la variable

        // Contar el total de tareas
        $tasksTotal = Task::where('user_id', $user->id)->count();

        if ($taskId) {
            // Obtener la posición de la tarea en la lista ordenada
            $position = Task::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->pluck('id')
                ->search($taskId);

            if ($position !== false) {
                // Calcular la página en la que está la tarea (10 tareas por página)
                $page = floor($position / 10) + 1;

                // Redirigir a la página correcta con la tarea resaltada si no estamos en la correcta
                if ($request->query('page') != $page) {
                    return redirect()->route('task.index', ['page' => $page, 'id' => $taskId]);
                }

                // Obtener la tarea a resaltar
                $taskShow = Task::find($taskId);
            }
        }

        // Paginar las tareas con el orden correcto
        $tasks = Task::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Calcular tareas mostradas hasta la página actual
        $tasksShown = ($tasks->currentPage() - 1) * $tasks->perPage() + $tasks->count();

        return view('task.list', compact('tasks', 'tasksTotal', 'tasksShown', 'taskShow'));
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
