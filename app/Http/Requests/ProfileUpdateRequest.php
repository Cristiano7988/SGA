<?php

namespace App\Http\Requests;

use App\Models\Usuario;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(Usuario::class)->ignore($this->user()->id)],
            'data_de_nascimento' => [
                'nullable',
                'date',
                'date_format:Y-m-d',
                'before:' . date('d/m/Y', strtotime('-14 year')),
                'after:' . date('d/m/Y', strtotime('-100 year')),
            ],
            'telefone' => ['nullable', 'min:8', 'max:30'],
        ];
    }
}
