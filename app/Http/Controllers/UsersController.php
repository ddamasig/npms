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

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // For admin only
        if (!Gate::allows('users.view', Auth::user()))
            return abort(403, 'Unauthorized action.');

        // Get the search query
        $query = $request->input('query');

        // Get all users paginated
        $users = User::where('first_name', 'ILIKE', '%' . $query . '%')->
            where('first_name', 'ILIKE', '%' . $query . '%')->
            orWhere('middle_name', 'ILIKE', '%' . $query . '%')->
            orWhere('last_name', 'ILIKE', '%' . $query . '%')->
            orWhere('username', 'ILIKE', '%' . $query . '%')->
            paginate(10);

        // Return the vuew with data
        return view('users.index')->with([
            'users' => $users
        ]);
    }

    public function create(Request $request)
    {
        // For admin only
        if (!Gate::allows('users.create', Auth::user()))
            return abort(403, 'Unauthorized action.');

        $message = $request->input('message');

        return view('auth.register')->with([
            'message' => $message,
        ]);        
    }

    public function store(Request $request)
    {
        // For admin only
        if (!Gate::allows('users.create', Auth::user()))
            return abort(403, 'Unauthorized action.');

        // Validate the input
        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required|min:6|confirmed',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);

        // Create the user
        $result = User::create([
            'username' => $request['username'],
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        // Initialize alert values
        $message = 'No message';
        $color = 'alert-danger';

        // If the user creation was successful
        if($result) {
            // Alter the alert values
            $message = 'User successfully created!';
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
        //
    }

    public function edit(Request $request, $id)
    {
        // For admin only
        if (!Gate::allows('users.update', Auth::user()))
            return abort(403, 'Unauthorized action.');

        $user = User::with(['privileges'])->find($id);
        $message = $request->input('message');

        $privilegeGroups= PrivilegeGroup::with(['privilege_items'])->get();
        return view('users.edit')->with([
            'user' => $user,
            'message' => $message,
            'privilegeGroups' => $privilegeGroups
        ]);
    }

    public function updateAccount(Request $request, $id)
    {
        // For admin only
        if (!Gate::allows('users.update', Auth::user()))
            return abort(403, 'Unauthorized action.');

        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        // Get the User
        $user = User::find($id);
        $user->username = request('username');
        $user->password = bcrypt(request('password'));

        $result = $user->save();

        $message = 'No message';
        $color = 'alert-danger';
        if($result) {
            $message = 'User account successfully updated!';
            $color = 'alert-success';
        }

        return redirect()->back()->with([
            'message' => $message,
            'color' => $color
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);

        // Get the User
        $user = User::find($id);
        $user->first_name = request('first_name');
        $user->middle_name = request('middle_name');
        $user->last_name = request('last_name');
        $user->email = request('email');

        $result = $user->save();

        $message = 'No message';
        $color = 'alert-danger';
        if($result) {
            $message = 'User information successfully updated!';
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
    }

    public function updatePrivileges(Request $request, $id)
    {
        // Get the new privilleges
        $newPrivilegeItems = $request->input('originalUserPrivileges');
        // Get the user that is being edited
        $user = User::find($id);
        // Delete the existing user privileges
        $oldPrivileges = Privilege::where('user_id', $id)->delete();

        foreach ($newPrivilegeItems as $key => $privilegeItem) {
            $privilege = new Privilege;
            $privilege->privilege_item_id = $privilegeItem;
            $privilege->user_id = $user->id;
            $privilege->save();
        }

        $message = 'User privilege successfully update!';
        $color = 'alert-success';

        return response()->json([
            'message' => 'User privileges updated successfully!',
            'color' => 'alert-success'
        ]);
    }
}
