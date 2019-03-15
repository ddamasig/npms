<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Module;

use App\Http\Controllers\Controller;

class ModulesController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function getByProject($projectId) {
        // Retrieve all modules using the Project ID param
        $modules = Module::where('project_id', $projectId)->get();

        return response()->json([
            'modules' => $modules
        ]);
    }
}
