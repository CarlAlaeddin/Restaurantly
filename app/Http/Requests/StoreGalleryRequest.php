<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreGalleryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (auth()->check() && auth()->user()->profile->role === 1)
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
            'status'    =>      "string[]",
            'image'     =>      "string[]"
        ]
    )]
    public function rules(): array
    {
        return [
            'status'    =>      ['required','numeric'],
            'image'     =>      ['required','mimes:jpg,bmp,png'],
        ];
    }
}
