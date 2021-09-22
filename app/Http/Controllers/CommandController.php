<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandController extends Controller
{
    public function index()
    {
        $commands = Command::all();
        return view('command.index', compact('commands'));
    }

    public function create($project_id = null)
    {
        $project_id ? $projects = Auth::user()->projects->where('id',$project_id): $projects = Auth::user()->projects;
        // dd($projects);
        return view('command.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $project = Auth::user()->projects()->where('id', $request->project_id)->first();

        $project->commands()->create($request->all());

        return back()->with(['message' => "Success!", 'class' => 'success']);
    }

    public function edit($id)
    {
        $command = Command::find($id);
        $projects = Auth::user()->projects;
        return view('command.edit', compact('command', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $command = Command::find($id);
        $command->update($request->all());
        Project::find($request->project_id)->commands()->save($command);

        return redirect()->route('command.index')->with(['message' => "Atualizado!", 'class' => 'success']);
    }

    public function delete( $id)
    {
        $command = Command::find($id);
        $command->delete();

        return redirect()->route('command.index')->with(['message' => "Removido com sucesso!", 'class' => 'success']);
    }


}
