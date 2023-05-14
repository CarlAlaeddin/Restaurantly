<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreChooseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (auth()->check() && auth()->user()->profile->role === 1)
        {
            return false;
        }
        return abort(403);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape([
            'title'         =>      "string[]",
            'description'   =>      "string[]",
            'status'        =>      "string[]"
        ]
    )]
    public function rules(): array
    {
        return [
            'title'         =>      ['required','min:5','max:50'],
            'description'   =>      ['required','min:50','max:1000'],
            'status'        =>      ['required','numeric'],
        ];
    }
}
