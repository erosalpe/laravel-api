<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();


        return view('pages.project.dashboard.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('pages.project.dashboard.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();

        $slug = Project::generateSlug($request->title);

        $val_data['slug'] = $slug;

        if($request->hasFile('preview')){
            $path = Storage::disk('public')->put('project_images', $request->preview);
            $val_data['preview'] = $path;
        }


        $newProject = Project::create($val_data);

        if($request->has('technologies')){
            $newProject->technologies()->attach($request->technologies);
        }

        

        return redirect()->route('dashboard.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //dd($project);

        return view('pages.project.dashboard.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('pages.project.dashboard.edit', compact('project','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();

        $slug = Project::generateSlug($request->title);

        $val_data['slug'] = $slug;

        if ($request->hasFile('preview')){
            if($project->preview){
                Storage::delete($project->preview);
            }
            $path = Storage::disk('public')->put('preview', $request->preview);
            $val_data['preview'] = $path;
        }

        $project->update($val_data);

        if($request->has('technologies')){
            $project->technologies()->sync($request->technologies);
        }

        return redirect()->route('dashboard.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->technologies()->sync([]);
        if($project->preview){
            Storage::delete($project->preview);
        }
        $project->delete();
        return redirect()->route('dashboard.projects.index');
    }
}
