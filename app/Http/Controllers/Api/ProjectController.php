<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;


class ProjectController extends Controller
{
    public function index(){

        $projects = Project::all();
        $technologies = Technology::all();
        $projects = Project::with('technologies')->get();

        return response()->json([
            'project'=> $projects,
            'success'=> true,
        ]);
    }
}
