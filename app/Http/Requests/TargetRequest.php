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

    public function messages(){
        return [
            'ime.required' => 'Polje ime je obavezno polje',
            'ime.min' => 'Polje ime mora sadrzati makar :min karaktera ',
            'prezime.required' => 'Polje prezime je obavezno polje',
            'prezime.min' => 'Polje prezime mora sadrzati makar :min karaktera ',
            'datum_rodjenja.required' => 'Polje za datum rodjenja je obavezno polje',
            'datum_rodjenja.date' => 'Nepravilan format datuma',
            'adresa.required' => 'Polje adresa je obavezno polje',
            'adresa.min' => 'Polje za adresu mora imati makar :min karaktera',
            'datum_rodjenja.before_or_equal' => 'Nepravilan format datuma',
            'mjesto_stanovanja.required' => 'Polje mjesto stanovanja je obavezno polje',
            'mjesto_stanovanja.min' => 'Polje za mjesto stanovanja mora sadrzati makar :min karaktera ',
            'sifra_objekta.required' => 'Polje sifra objekta je obavezno polje',
            'slika.file' => 'Mora biti fajl',
            'slika.image' => 'Fajl mora biti slika'
        ];
    }
}
