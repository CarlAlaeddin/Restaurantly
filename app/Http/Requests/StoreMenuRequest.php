<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreMenuRequest extends FormRequest
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
            'tag_id'        =>      "string[]",
            'category'      =>      "string[]",
            'name'          =>      "string[]",
            'price'         =>      "string[]",
            'image'         =>      "string[]",
            'status'        =>      "string[]"
        ]
    )]
    public function rules(): array
    {
        return [
            'tag_id'        =>     ['required','numeric'],
            'category'      =>     ['required','array'],
            'name'          =>     ['required','min:10','max:100'],
            'price'         =>     ['required','numeric'],
            'image'         =>     ['required','mimes:jpg,bmp,png'],
            'status'        =>     ['required','numeric'],
        ];
    }
}
