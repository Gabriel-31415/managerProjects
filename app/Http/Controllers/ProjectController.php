<?php

namespace App\Http\Controllers;

use DateInterval;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $todo = Project::where('status', 'todo')->get();
        $doing = Project::where('status', 'doing')->get();
        $done = Project::where('status', 'done')->get();
        return view('project.index', compact('todo', 'doing', 'done'));
    }

    public function show($id)
    {
        $project = Project::find($id);
        $projects = Project::where('status', $project->status)->get();
        $dayofweek = getdate()['wday'] - 1;
        // dd($dayofweek);
        $sunday = date('Y-m-d',strtotime('last sunday'));
        // $sunday = $seconds = now()->sub(new DateInterval('P6D'));
        // $sunday = date_sub(now(), date_interval_create_from_date_string($dayofweek.' days'));
        // dd($sunday);
        $taks = $project->tasks->where('created_at', '>', $sunday)->sortDesc();
        return view('project.show', compact('project', 'projects', 'taks'));
    }


    public function create()
    {

        return view('project.create');
    }

    public function store(Request $request)
    {
        $project = Auth::user()->projects()->create($request->all());

        if($request->has('image')){
            $path = $request->file('image')->storeAs(
                'img',
                $project->id.'/'.$request->file('image')->getClientOriginalName(),
                'public'
            );
            $project->image = $path;
            $project->save();
        }

        return redirect()->route('project.index')->with(['message' => "Success!", 'class' => 'success']);
    }

    public function edit($id)
    {
        $project = Auth::user()->projects()->find($id);
        return view('project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Auth::user()->projects()->find($id);
        $project->update($request->all());

        return redirect()->route('project.index')->with(['message' => "Atualizado!", 'class' => 'success']);
    }

    public function delete( $id)
    {
        $project = Auth::user()->projects()->find($id);
        $project->delete();

        return redirect()->route('project.index')->with(['message' => "Removido com sucesso!", 'class' => 'success']);
    }

    public function updateStatus($id)
    {
        $project = Auth::user()->projects()->where('id', $id)->first();

        switch ($project->status) {
            case 'todo':
                $project->update(['status' => 'doing']);
                break;
            case 'doing':
                $project->update(['status' => 'done']);
                break;
            case 'done':
                $project->update(['status' => 'todo']);
                break;

            default:
                $project->update(['status' => 'todo']);

                break;
        }
        return redirect()->route('project.index')->with(['message' => "Success!", 'class' => 'success']);
    }

    public function archived()
    {
        $projects = Auth::user()->projects()->onlyTrashed()->get();

        return view('project.archived', compact('projects'));
    }

    public function restore($id)
    {
        Auth::user()->projects()->withTrashed()
                                            ->where('id', $id)
                                            ->restore();
        return redirect()->route('project.index')->with(['message' => "Restore with success!", 'class' => 'success']);
    }
}
