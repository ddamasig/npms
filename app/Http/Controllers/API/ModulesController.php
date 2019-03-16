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
        // Retrieve the Module
        $module = Module::find($id);
        // Update the values using the form inputs
        $module->name = $request->input('name');
        $module->description = $request->input('description');
        $module->project_id = $request->input('project_id');
        $result = $module->save();

        // Return a response
        return response()->json();
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
