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

        return true;

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
        ]
    )]
    public function rules(): array
    {
        return [
            'image'     =>     ['required','mimes:jpg,bmp,png'],
            'title'     =>     ['required','min:10','max:30'],
            'price'     =>     ['required','numeric'],
            'body'      =>     ['required','min:50','max:1000'],
        ];
    }
}
