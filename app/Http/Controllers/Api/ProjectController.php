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
        return response()->json([
            'code' => 200,
            'message' => 'success',
            'results' => [
                'projects' => $projects
            ]
        ]);
    }
}
