<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreProfileRequest extends FormRequest
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
        'image'                 =>      "string[]",
        'phone_number'          =>      "string[]",
        'address'               =>      "string[]",
        'beloved'               =>      "string[]",
        'biography'             =>      "string[]",
        'status'                =>      "string[]"
        ]
    )]
    public function rules(): array
    {
        return [
            'image'             =>      ['required', 'mimes:jpg,bmp,png'],
            'phone_number'      =>      ['required', 'numeric'],
            'address'           =>      ['required', 'string', 'min:10', 'max:100'],
            'beloved'           =>      ['required', 'alpha:ascii'],
            'biography'         =>      ['required', 'mix:10'],
            'status'            =>      ['required', 'numeric'],
        ];
    }
}
