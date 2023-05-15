<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreTagRequest extends FormRequest
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
            'tag' => "string[]",
            'status' => "string[]"
        ]
    )]
    public function rules(): array
    {
        return [
            'tag'     =>    ['required','min:3','max:100','string'],
            'status'  =>    ['required','numeric'],
        ];
    }
}
