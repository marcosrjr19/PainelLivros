<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannersStoreRequest extends FormRequest
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
            'banners' => 'required|array|min:1',
            'banners.*' => 'image|'
        ];
    }

    public function messages()
    {
        return [
            'banners.required' => 'Ao menos uma imagem é necessaria',
            'banners.*.image' => 'Só são aceitas imagens',
           
        ];
    }

}
