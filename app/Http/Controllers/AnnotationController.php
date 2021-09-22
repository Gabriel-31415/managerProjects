<?php

namespace App\Http\Controllers;

use App\Models\Annotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnotationController extends Controller
{
    public function index()
    {
        $annotations = Annotation::with('project')->get();
        return view('annotation.index', compact('annotations'));
    }

    public function create($project_id = null)
    {
        $project_id ? $projects = Auth::user()->projects->where('id',$project_id): $projects = Auth::user()->projects;
        return view('annotation.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $project = Auth::user()->projects()->where('id', $request->project_id)->first();

        $project->annotations()->create($request->all());

        return back()->with(['message' => "Success!", 'class' => 'success']);
    }

    public function edit($id)
    {
        $annotation = Annotation::find($id);
        return view('annotation.edit', compact('annotation'));
    }

    public function update(Request $request, $id)
    {
        $annotation = Annotation::find($id);
        $annotation->update($request->all());

        return redirect()->route('annotation.index')->with(['message' => "Atualizado!", 'class' => 'success']);
    }

    public function delete( $id)
    {
        $annotation = Annotation::find($id);
        $annotation->delete();

        return redirect()->route('annotation.index')->with(['message' => "Removido com sucesso!", 'class' => 'success']);
    }
}
