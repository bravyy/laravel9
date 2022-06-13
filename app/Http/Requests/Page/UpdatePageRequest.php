<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:191',
            'page_title' => 'nullable|string|max:191',
            'body' => 'nullable|string',
            'published' => 'nullable|int',
            'show_in_menu' => 'nullable|int',
        ];
    }
}
