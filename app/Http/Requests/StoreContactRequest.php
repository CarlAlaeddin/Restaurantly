<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreContactRequest extends FormRequest
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
     * @return array
     */
    #[ArrayShape([
        'name'          => "string[]",
        'email'         => "string[]",
        'subject'       => "string[]",
        'message'       => "string[]"
        ]
    )]
    public function rules(): array
    {
        return [
            'name'      =>    ['required','min:4','max:40','alpha:ascii'],
            'email'     =>    ['required','email'],
            'subject'   =>    ['required','min:4','max:100'],
            'message'   =>    ['required','min:4','max:1000'],
        ];
    }
}
