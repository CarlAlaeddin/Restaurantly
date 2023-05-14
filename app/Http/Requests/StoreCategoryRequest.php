<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (auth()->check() && auth()->user()->profile->role === 1 || auth()->user()->profile->role === 2) {
            return true;
        }
        return abort(403);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape([
            'name'      => "string",
            'status'    => "string",
        ]
    )]
    public function rules(): array
    {
        return [
            'name'      => ['required','min:5','max:30','unique:categories','alpha:ascii'],
            'status'    => ['required','numeric'],
        ];
    }
}
