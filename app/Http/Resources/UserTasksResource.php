<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use App\Models\Tasks;

class UserTasksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => User::select('name')->where('id', $this->user_id)->get()[0]['name'],
            'task' => Tasks::select('name')->where('id', $this->task_id)->get()[0]['name'],
            'user_id' => $this->user_id,
            'task_id' => $this->task_id,
            'remarks' => $this->remarks,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'due_date' => Tasks::select('due_date')->where('id', $this->task_id)->get()[0]['due_date'],
        ];
    }
}
