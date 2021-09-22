<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProblemController extends Controller
{
    public function index()
    {
        $problems = Problem::all();
        return view('problem.index', compact('problems'));
    }

    public function create($project_id = null)
    {
        $project_id ? $projects = Auth::user()->projects->where('id',$project_id): $projects = Auth::user()->projects;
        return view('problem.create', compact('projects'));
    }


    public function store(Request $request)
    {
        $project = Auth::user()->projects()->where('id', $request->project_id)->first();
        // dd($project->problems);
        $project->problems()->create($request->all());

        return back()->with(['message' => "Success!", 'class' => 'success']);
    }

    public function edit($id)
    {
        $problem = Problem::find($id);
        return view('problem.edit', compact('problem'));
    }

    public function update(Request $request, $id)
    {
        $problem = Problem::find($id);
        $problem->update($request->all());

        return redirect()->route('problem.index')->with(['message' => "Atualizado!", 'class' => 'success']);
    }

    public function delete( $id)
    {
        $problem = Problem::find($id);
        $problem->delete();

        return back()->with(['message' => "Removido com sucesso!", 'class' => 'success']);
    }

    public function updateStatus($id)
    {
        $problem = Problem::find($id);

        $problem->update(['resolved' => $problem->resolved ? false : true]);

        return back()->with(['message' => "Updated!", 'class' => 'success']);
    }
}
