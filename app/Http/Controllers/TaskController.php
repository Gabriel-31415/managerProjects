<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::all();
        $projects = Auth::user()->projects;
        return view('task.index', compact('tasks', 'request', 'projects'));
    }

    public function create($project_id = null)
    {
        $project_id ? $projects = Auth::user()->projects->where('id',$project_id): $projects = Auth::user()->projects;
        return view('task.create', compact('projects'));
    }


    public function store(Request $request)
    {
        $project = Auth::user()->projects()->where('id', $request->project_id)->first();
        // dd($request->all());
        $project->tasks()->create($request->all());

        return back()->with(['message' => "Success!", 'class' => 'success']);
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $task = Task::find($id);
        $task->update($request->all());
        

        return redirect()->route('task.index')->with(['message' => "Atualizado!", 'class' => 'success']);
    }

    public function delete( $id)
    {
        $task = Task::find($id);
        $task->delete();

        return back()->with(['message' => "Removido com sucesso!", 'class' => 'success']);
    }

    public function updateStatus($id)
    {
        $task = Task::find($id);

        switch ($task->status) {
            case 'todo':
                $task->update(['status' => 'doing']);
                break;
            case 'doing':
                $task->update(['status' => 'done']);
                break;
            case 'done':
                $task->update(['status' => 'todo']);
                break;

            default:
                $task->update(['status' => 'todo']);

                break;
        }


        return back()->with(['message' => "Success!", 'class' => 'success']);
    }
}
