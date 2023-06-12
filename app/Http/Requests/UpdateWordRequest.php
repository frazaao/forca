<?php

namespace App\Http\Requests;

use App\Models\Word;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWordRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            Word::WORD => ['required', 'string', 'min:3', 'max:5'],
            Word::LEVEL => ['integer', 'nullable'],
        ];
    }

    public function messages()
    {
        return [
            Word::WORD . '.required' => 'O campo palavra é obrigatório',
            Word::WORD . '.string' => 'O campo palavra precisa ser do tipo string',
            Word::WORD . '.min' => 'O campo palavra precisa ter no mínimo 3 caracteres',
            Word::WORD . '.max' => 'O campo palavra precisa ter no máximo 5 caracteres',
            Word::LEVEL . '.string' => 'O campo nível precisa ser do tipo string',
        ];
    }
}
