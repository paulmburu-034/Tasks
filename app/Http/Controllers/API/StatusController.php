<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Http\Requests\StatusStoreRequest;
use App\Http\Resources\StatusResource;

class StatusController extends Controller
{
    public function index()
    {
        return StatusResource::collection(Status::all());
    }

    public function show(Status $status)
    {
        return new StatusResource($status);
    }

    public function store(StatusStoreRequest $request){
        Status::create($request->validated());
        return response()->json("status Created");
    }

    public function update(StatusStoreRequest $request, Status $status){
        $status->update($request->validated());
        return $status;
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return response()->json("status Deleted");
    }
}
