<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateMenuRequest extends FormRequest
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
    #[ArrayShape(['name' => "string", 'price' => "string", 'image' => "string", 'tag' => "string"])]
    public function rules(): array
    {
        return [
//            'name'  =>  'required',
//            'price' =>  'required',
//            'image' =>  'mimes:jpg,png,webp,jpeg',#mimes:jpg,png,webp,jpeg|dimensions:min_width=350,min_height=350|
//            'tag'   =>  'unique:tags'
        ];
    }
}
