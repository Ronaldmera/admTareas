<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pendingTasks = Task::where('status', '=','pendiente')->orderBy('created_at', 'desc')->get();//obtine las tareas pendientes y de manera desc
        $complete = Task::where('status','=','completada')->count();
        $pending = Task::where('status','=','pendiente')->count();
        return view('dashboard', compact('pendingTasks','pending', 'complete')); // Envía $tasks a la vista
    }


}
