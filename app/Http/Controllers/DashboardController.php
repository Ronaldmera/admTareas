<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener solo las últimas 10 tareas pendientes
        $tasks = Task::where('status', 'pendiente')
            ->orderBy('created_at','asc')
            ->limit(10)
            ->get();

        // Paginar manualmente en Laravel en grupos de 5
        $pendingTasks = new \Illuminate\Pagination\LengthAwarePaginator(
            $tasks->forPage(request()->get('page', 1), 5), // 5 tareas por página
            $tasks->count(), // Total de tareas (máximo 10)
            5, // Número de tareas por página
            request()->get('page', 1),
            ['path' => request()->url()]
        );

        // Contadores de tareas completadas y pendientes
        $complete = Task::where('status', 'completada')->count();
        $pending = Task::where('status', 'pendiente')->count();

        return view('dashboard', compact('pendingTasks', 'pending', 'complete')); // Enviar datos a la vista
    }



}
