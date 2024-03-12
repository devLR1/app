<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TargetRequest extends FormRequest
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
            'ime' => 'required|min:3',
            'prezime' => 'required|min:3',
            'datum_rodjenja' => 'required|date|before_or_equal:today',
            'adresa' => 'required|min:3',
            'mjesto_stanovanja' => 'required|min:3',
            'slika' => 'file|image',
            'sifra_objekta' => 'required'
        ];
    }
}
