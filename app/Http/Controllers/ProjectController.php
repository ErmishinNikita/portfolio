<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('skills')->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $skills = Skill::all();
        return view('projects.create', compact('skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ]);

        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->has('skills')) {
            $project->skills()->attach($request->skills);
        }
        return redirect()->route('projects.index')->with('success', 'Проект успешно создан!');
    }

    public function edit(Project $project)
    {
        $skills = Skill::all();
        return view('projects.edit', compact('project', 'skills'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ]);

        $project->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->has('skills')) {
            $project->skills()->sync($request->skills);
        } else {
            $project->skills()->detach(); 
        }

        return redirect()->route('projects.index')->with('success', 'Проект успешно обновлен!');
    }

    public function destroy(Project $project)
    {
        $project->skills()->detach();
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Проект успешно удален!');
    }
}
