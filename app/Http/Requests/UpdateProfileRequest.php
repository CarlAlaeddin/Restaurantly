<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (auth()->check())
        {
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
            'image'             =>      "string[]",
            'phone_number'      =>      "string[]",
            'address'           =>      "string[]",
            'beloved'           =>      "string[]",
            'biography'         =>      "string[]",
            'name'              =>      "string[]",
            'email'             =>      "string[]",
        ]
    )]
    public function rules(): array
    {
        return [
            'image'             =>      ['nullable','mimes:jpg,bmp,png'],
            'phone_number'      =>      ['required','numeric'],
            'address'           =>      ['required','string','min:5','max:200'],
            'beloved'           =>      ['required','string'],
            'biography'         =>      ['required','max:1000'],
            'name'              =>      ['required','min:4','max:100'],
            'email'             =>      ['required','email:rfc,dns'],

        ];
    }
}
