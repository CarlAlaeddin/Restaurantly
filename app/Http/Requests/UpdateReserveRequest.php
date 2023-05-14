<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateReserveRequest extends FormRequest
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
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape([
            'name'      =>      "string[]",
            'email'     =>      "string[]",
            'phone'     =>      "string[]",
            'date'      =>      "string[]",
            'time'      =>      "string[]",
            'people'    =>      "string[]",
            'message'   =>      "string[]"
        ]
    )]
    public function rules(): array
    {
        return [
            'name'      =>      ['required','min:4','max:20'],
            'email'     =>      ['required','email'],
            'phone'     =>      ['required','numeric'],
            'date'      =>      ['required','date'],
            'time'      =>      ['required'],
            'people'    =>      ['required','numeric'],
            'message'   =>      ['required','mix:20','max:1000'],
        ];
    }
}
