<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\Project;
use App\Models\User;
use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTasksRequest;
use App\Http\Requests\UpdateTasksRequest;
use Illuminate\Console\View\Components\Task;

class tasktController extends Controller
{
    public function index()
    {
        $tasks = Tasks::with(['client','user','project'])->get();

        return view('task.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $clients = Client::all();
        $projects = Project::all();
        return view('task.create',compact('clients','users','projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTasksRequest $request)
    {
        Tasks::create($request->validated());
        return redirect()->route('admin.tasks.index')->with('sucess','tearea creado kfdsmfgkdfm');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $task)
    {
        $users = User::all();
        $clients = Client::all();
        $projects = Project::all();
        return view('task.edit',compact('clients','users','projects','task'));//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTasksRequest $request, Tasks $task)
    {

        $task->update($request->validated());
        return redirect()->route('admin.tasks.index')->with('sucess','proyecto actualizado kfdsmfgkdfm');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $task)
    {
        $task->delete();
        return back();
    }
}
