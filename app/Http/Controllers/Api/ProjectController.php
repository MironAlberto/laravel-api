<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technologies')->paginate(6);

        return response()->json([
            'code' => 200,
            'message' => 'success',
            'results' => [
                'projects' => $projects
            ]
        ]);
    }

    public function show(Project $project)
    {   
        $project = Project::with('type', 'technologies');

        if ($project != null){
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'results' => [
                    'project' => $project
                ]
            ]);
        }
        else {
            return response()->json([
                'code' => 404,
                'message' => 'error',
                'results' => null
            ]);
        }
    }
}
