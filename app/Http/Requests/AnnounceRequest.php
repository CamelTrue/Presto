<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnounceRequest extends FormRequest
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
            'title' => 'required|min:5|max:40',
            'description' => 'required|min:20|max:200',
            'price' => 'required',
            'category' => 'required',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Devi inserire il titolo dell\'annuncio',
            'title.min' => 'Il titolo deve essere minimo di 5 caratteri',
            'title.max' => 'Il titolo deve essere massimo di 40 caratteri',
            'description.required' => 'Devi inserire la descrizione',
            'description.min' => 'la descrizione deve essere minimo di 20 caratteri',
            'description.max' => 'La Descrizione deve essere massimo di 200 caratteri',
            'price.required' => 'Il prezzo e\' obbligatorio',
            'category.required' => 'Devi scegliere la categoria'
        ];
    }
}