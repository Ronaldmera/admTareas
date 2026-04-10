<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userName = $user->name;

        $pendingTasks = Task::where('user_id', $user->id)
            ->where('status', 'pendiente')
            ->orderBy('created_at', 'asc')
            ->paginate(5);

        $complete = Task::where('user_id', $user->id)
            ->where('status', 'completada')
            ->count();

        $pending = Task::where('user_id', $user->id)
            ->where('status', 'pendiente')
            ->count();

        return view('dashboard', compact('userName','pendingTasks', 'pending', 'complete'));
    }
}