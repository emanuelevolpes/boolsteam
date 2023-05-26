<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //MAIN
            'title'=> 'required|string|max:100',
            'image'=> 'nullable|image',
            'description'=> 'nullable',
            'publisher'=> 'required|string|max:100',
            'developer'=> 'required|string|max:100',
            'genres'=> 'required',
            'platform'=> 'required',
            'year'=> 'required',

            //COMMERCIAL
            'region'=> 'required|string',
            'sales'=> 'required|integer',
            'price'=> 'required|numeric',
            'score'=> 'required|numeric',
            'downloads'=> 'required|integer',

            //TAGS
            'supported_languages'=> 'required|string',

            //REQUIREMENTS
            'minimum_operating_system'=> 'required|string',
            'minimum_memory_ram'=> 'required|integer',
            'minimum_gpu'=> 'required|integer',
            'minimum_cpu'=> 'required|integer',
            'space_required'=> 'required|numeric'
        ];
    }
}
