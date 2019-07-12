<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class BookStoreRequest extends FormRequest
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
            'book_name' => 'required|string',
            'page_count' => 'required|integer|min:1',
            'authors' => 'required|array|min:1|exists:author,id',
            'publishing_company' => ['required', 'string', 'exists:publishing_company,id'],
            'book_img' => 'sometimes|image|max:2048'
            //
        ];
    }

      /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'book_name.required' => 'O nome do livro é necessário!',
            'page_count.required' => 'A quantidade de páginas é necessaria!',
            'authors.required' => 'O livro deve conter ao menos um autor!',
            'publishing_company.required' => 'É necessário uma editora para o livro'
        ];
    }
}
