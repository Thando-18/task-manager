<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // New tasks can't be due in the past; existing tasks may keep an older date.
        $dueDateRules = ['required', 'date'];
        if ($this->isMethod('post')) {
            $dueDateRules[] = 'after_or_equal:today';
        }

        return [
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'due_date'    => $dueDateRules,
            'status'      => ['required', Rule::in(array_keys(Task::STATUSES))],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'          => 'Please enter a task title.',
            'due_date.required'       => 'Please choose a due date.',
            'due_date.date'           => 'The due date is not a valid date.',
            'due_date.after_or_equal' => 'The due date cannot be in the past.',
            'status.in'               => 'Please choose a valid status.',
        ];
    }
}
