<?php

namespace App\Http\Controllers;

use App\User;
use App\Privilege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\PrivilegeItem;
use Illuminate\Support\Facades\DB;
use App\PrivilegeGroup;
use App\Project;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query
        $query = $request->input('query');
        // Get all the projects
        $projects = Project::where('name', 'ILIKE', '%' . $query . '%')->paginate(8);

        return view('projects.index')->with([
            'projects' => $projects
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        // Create Project Entry
        $result = Project::create($request->all());

        // Initialize alert values
        $message = 'No message';
        $color = 'alert-danger';

        // If the user creation was successful
        if($result) {
            // Alter the alert values
            $message = 'Project successfully created!';
            $color = 'alert-success';
        }

        // Go back to the previous page with the alert values
        return redirect()->back()->with([
            'message' => $message,
            'color' => $color,
        ]);
    }

    public function show($id)
    {
        // For admin only
        if (!Gate::allows('users.update', Auth::user()))
            return abort(403, 'Unauthorized action.');

        $project = Project::with(['modules'])->find($id);

        return view('projects.show')->with([
            'project' => $project
        ]);
    }

    public function edit(Request $request, $id)
    {
        // For admin only
        if (!Gate::allows('users.update', Auth::user()))
            return abort(403, 'Unauthorized action.');

        $project = Project::find($id);
        $message = $request->input('message');

        $privilegeGroups= PrivilegeGroup::with(['privilege_items'])->get();
        return view('projects.edit')->with([
            'project' => $project,
            'message' => $message,
            'privilegeGroups' => $privilegeGroups
        ]);
    }

    public function update(Request $request, $id)
    {
        // For admin only
        if (!Gate::allows('users.update', Auth::user()))
            return abort(403, 'Unauthorized action.');

        $this->validate(request(), [
            'name' => 'required',
            'client' => 'required',
            'description' => 'required',
            'contact_id' => 'required',
            'manager_id' => 'required',
        ]);

        $project = Project::find($id);
        $project->name = $request->input('name');
        $project->client = $request->input('client');
        $project->description = $request->input('description');
        $project->manager_id = $request->input('manager_id');
        $project->contact_id = $request->input('contact_id');

        $result = $project->save();

        $message = 'No message';
        $color = 'alert-danger';
        if($result) {
            $message = 'Project successfully updated!';
            $color = 'alert-success';
        }

        return redirect()->back()->with([
            'message' => $message,
            'color' => $color
        ]);
    }

    public function destroy($id)
    {
        // For admin only
        if (Gate::allows('users.delete', Auth::user()))
            return abort(403, 'Unauthorized action.');
        
        // Get the user that is being edited
        $project = Project::find($id);
        // Delete the existing user privileges
        $result = $project->delete();

        if($result) {
            $message = 'Project successfully deleted!';
            $color = 'alert-success';
        }
        else {
            $message = 'An error has occurred during the process!';
            $color = 'alert-success';
        }

        return redirect()->back()->with([
            'message' => $message,
            'color' => $color,
        ]);
    }
}
