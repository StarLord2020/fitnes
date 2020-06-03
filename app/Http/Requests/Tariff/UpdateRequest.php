<?php

namespace App\Http\Requests\Tariff;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required','max:255', 'unique:tariffs,name,'.$this['id']],
            'price'=>'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'name.unique'  => 'Такий тариф вже є',
        ];
    }
}
