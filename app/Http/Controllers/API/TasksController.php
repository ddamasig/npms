<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $result = Task::create($request->all());
        return response()->json();
    }

    public function getByModule($id) {
        // Retrieve all modules using the Project ID param
        $tasks = Task::where('module_id', $id)->get();

        return response()->json([
            'tasks' => $tasks
        ]);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->name = $request->input('name');
        $task->developer_id = $request->input('developer_id');
        $result = $task->save();

        return response()->json();
    }

    public function markAsFinished($id) {
        $task = Task::find($id);
        $task->status = "finished";
        $task->save();

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return response()->json();
    }
}
