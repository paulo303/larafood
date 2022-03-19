<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlanRequest extends FormRequest
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
        $url = $this->segment(3);

        return [
            'name' => "required|min:3|max:255|unique:plans,name,{$url},url",
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'description' => 'nullable|min:3|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Já existe no banco de dados um plano com este nome',
            '*.required' => 'O campo :attribute é obrigatório',
            '*.min' => 'O tamanho mínimo de caracteres para o campo :attribute é 3',
            '*.max' => 'O tamanho máximo de caracteres para o campo :attribute é 255',
            '*.regex' => 'O formato do campo :attribute é inválido',
        ];
    }
}
