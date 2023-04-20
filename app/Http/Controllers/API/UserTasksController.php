<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserTasks;
use Illuminate\Http\Request;
use App\Http\Requests\UserTasksStoreRequest;
use App\Http\Resources\UserTasksResource;

class UserTasksController extends Controller
{
    public function index()
    {        
        return UserTasksResource::collection(UserTasks::all());
    }

    public function show(UserTasks $usertask)
    {
        return new UserTasksResource($usertask);
    }

    public function store(UserTasksStoreRequest $request){
        UserTasks::create($request->validated());
        return response()->json("status Created");
    }

    public function update(UserTasksStoreRequest $request, UserTasks $usertask){
        $usertask->update($request->validated());
        return $usertask;
    }

    public function destroy(UserTasks $status)
    {
        $usertask->delete();
        return response()->json("status Deleted");
    }
}
