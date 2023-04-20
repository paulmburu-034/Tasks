<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Http\Requests\TasksStoreRequest;
use App\Http\Resources\TasksResource;

class TasksController extends Controller
{
    public function index()
    {
        return TasksResource::collection(Tasks::all());
    }    

    public function show(Tasks $task)
    {
        return new TasksResource($task);
    }

    public function store(TasksStoreRequest $request){
        Tasks::create($request->validated());
        return response()->json("Task Created");
    }

    public function update(TasksStoreRequest $request, Tasks $task){
        $task->update($request->validated());
        return $task;
    }

    public function destroy(Tasks $task)
    {
        $task->delete();
        return response()->json("Task Deleted");
    }
}
