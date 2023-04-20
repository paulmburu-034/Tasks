<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Tasks;

class UserTasksStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['required'],
            'task_id' => ['required'],
            'remarks' => ['required', 'min:2', 'max:255'],
            'start_time' => ['required'],// 'before: '.Tasks::select('due_date')->where('id', $this->task_id)->get()],
            'end_time' => ['required'],// 'before:start_time'],
        ];
    }
}
