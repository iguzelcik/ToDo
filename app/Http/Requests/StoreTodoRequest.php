<?php

namespace App\Http\Requests;

use App\Enums\TodoStatusEnum;
use App\Enums\TodoPriorityEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'due_date' => ['nullable','date'],
            'is_completed' => ['sometimes','boolean'],
            'category_id' => ['nullable','exists:categories,id'],
            'priority' => ['required',Rule::enum(TodoPriorityEnum::class)],
            'status' => ['required',Rule::enum(TodoStatusEnum::class)],
            'is_starred' => ['sometimes'],
            //'user_id' => ['required','exists:users,id'],
            'completed_at' => ['nullable','date'],

        ];
            //
        
    }
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'description.string' => 'The description must be a string.',
            'due_date.date' => 'The due date must be a valid date.',
            'is_completed.boolean' => 'The is completed field must be true or false.',
            'category_id.exists' => 'The selected category is invalid.',
            'priority.enum' => 'The selected priority is invalid.',
            'status.enum' => 'The selected status is invalid.',
            'is_starred.boolean' => 'The is starred field must be true or false.',
            //'user_id.exists' => 'The selected user is invalid.',
            'completed_at.date' => 'The completed at must be a valid date.',

        ];
    }
}
