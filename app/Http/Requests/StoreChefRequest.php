<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreChefRequest extends FormRequest
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
        'name'           =>      "string[]",
        'twitter'        =>      "string[]",
        'facebook'       =>      "string[]",
        'instagram'      =>      "string[]",
        'linkedin'       =>      "string[]",
        'status'         =>      "string[]",
        'position'       =>      "string[]",
        'image'          =>      "string[]"
        ]
    )]
    public function rules(): array
    {
        return [
            'name'       => ['required','alpha:ascii','min:5','max:50'],
            'twitter'    => ['required','url'],
            'facebook'   => ['required','url'],
            'instagram'  => ['required','url'],
            'linkedin'   => ['required','url'],
            'status'     => ['required','numeric'],
            'position'   => ['required','numeric'],
            'image'      => ['required','mimes:jpg,bmp,png'],
        ];
    }
}
