<?php

namespace App\Http\Requests\Game;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'game_name' => 'required|unique:games|string|min:2|max:20',
            'word' => 'required|string|min:2|max:20',
            'attempts' => 'required|integer|min:1|max:10',
            'private_lobby' => '',
            'letter_hints' => '',
            'password' => '',
        ];
    }
}
