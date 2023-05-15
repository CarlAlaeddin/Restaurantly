<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreSpecialRequest extends FormRequest
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
        'menu_name'         =>      "string[]",
        'title'             =>      "string[]",
        'image'             =>      "string[]",
        'description'       =>      "string[]",
        'status'            =>      "string[]"])] public function rules(): array
    {
        return [
            'menu_name'     =>      ['required','min:10'],
            'title'         =>      ['required','min:10','string'],
            'image'         =>      ['required','mimes:jpg,bmp,png'],
            'description'   =>      ['required','min:10'],
            'status'        =>      ['required','numeric'],
        ];
    }
}
