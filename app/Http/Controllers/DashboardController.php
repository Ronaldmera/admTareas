<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tasks = Task::all(); // Obtiene todas las tareas

        $tasksComplete = $tasks -> where('status', '==', 'pendiente');//obtiene las tareas pendientes
        return view('dashboard', compact('tasksComplete')); // Envía $tasks a la vista
    }

}
