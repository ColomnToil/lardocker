<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо к заполнению',
            'title.string' => 'Данные должны быть сточного типа',

            'content.required' => 'Это поле необходимо к заполнению',
            'content.string' => 'Данные должны быть сточного типа',

            'preview_image.file' => 'Данные должны быть изображением',

            'main_image.file' => 'Данные должны быть изображением',

            'category_id.required' => 'Это поле необходимо к заполнению',
            'category_id.integer' => 'Данные должны быть числом',
            'category_id.exists' => 'Id должен быть в базе данных',

            'tag_ids.array' => 'Данные должны быть массивом',
        ];
    }
}
