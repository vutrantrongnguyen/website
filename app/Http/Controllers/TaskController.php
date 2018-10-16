<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        Auth::check();
        $newTasks = $user->tasks->where('completed', Task::STATUS_NEW)->all();
        $completedTasks = $user->tasks->where('completed', Task::STATUS_DONE)->all();
        return view('tasks.index', compact('completedTasks', 'newTasks'));
    }

    public function show( $id )
    {
        $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }

   public function destroy( $task )
    {
        $currentTask = Task::findOrFail( $task);
        $currentTask->delete();
        return redirect('/tasks');
    }


    public function store( Request $request )
    {
        $user = Auth::user();

        $task = new Task;
        $task->name = $request->gigido;
        $task->user_id = $user->id;
        $task->save();
        return redirect('/tasks');

    }

    public function create()
    {
        return view('tasks.create');
    }

    public function update($taskId, Request $request)
    {
        $task = Task::findOrFail($taskId);
        $task->completed = $request->completed;
        $task->save();
        return redirect()->back();
    }
}
