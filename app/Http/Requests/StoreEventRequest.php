<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreEventRequest extends FormRequest
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
            'image'     =>      "string[]",
            'title'     =>      "string[]",
            'price'     =>      "string[]",
            'body'      =>      "string[]",
            'status'    =>      "string[]"
        ]
    )]
    public function rules(): array
    {
        return [
            'image'     =>     ['required','mimes:jpg,bmp,png'],
            'title'     =>     ['required','min:10','max:30'],
            'price'     =>     ['required','numeric'],
            'body'      =>     ['required','min:50','max:1000'],
            'status'    =>     ['required','numeric'],
        ];
    }
}
