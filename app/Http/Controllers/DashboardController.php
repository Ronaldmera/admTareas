<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pendingTasks = Task::where('status', '=','pendiente')->orderBy('created_at', 'desc')->get();//obtine las tareas pendientes y de manera desc

        return view('dashboard', compact('pendingTasks')); // Envía $tasks a la vista
    }


}
